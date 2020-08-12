<?php
namespace App\Http\Controllers\dashboard\products;

use App\Model\Code;
use App\Model\Cutting;
use App\Model\Packing;
use App\Model\ProductCutting;
use App\Model\ProductPacking;
use App\Model\ProductSize;
use App\Model\Size;
use Validator;
use DB;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rootDir = $_SERVER['DOCUMENT_ROOT'].'/assets/dashboard/images/dashboard/fileManager/';
        //$rootDir = __DIR__; // __DIR__ = take the root folder directory
        $currentDirectoryItems = array_diff(scandir($rootDir . "/", 1), [".", ".."]); // Use array_diff to remove both period values eg: ("." , "..")
        $allFiles = [];
        foreach ($currentDirectoryItems as $value) {
        $allFiles[] = $value;

         if (is_dir($rootDir . "/" . $value)) { // Check if specified path is a directory
          $allFiles[] = array_diff(scandir($rootDir . "/" . $value), [".", ".."]); // Use array_diff to remove both period values eg: ("." , "..");
         }
        }
       // print_r($allFiles);
        $products = Product::orderBy('id', 'desc')->get();
        return view('dashboard.products.index', compact('products','allFiles'));
    }

    public function create()
    {
        $data['categories'] = DB::table('categories')->get();
        $data['cutting'] = Cutting::all();
        $data['packing'] = Packing::all();
        $data['sizes'] = Size::all();
        return view('dashboard.products.create', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name_en' => 'required|max:190',
            'name_ar' => 'required|max:190',
            'description_en' => 'required',
            'description_ar' => 'required',
            'price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }

        $categories = null;
        if ($request->has('categories')) {
            $categories = implode('|', $request->categories);
        }


        $packaging_method = null;
        if ($request->has('packaging_method')) {
            $packaging_method = implode('|', $request->packaging_method);
        }
        if ($request->digital_product){
            $digitalProductt = 1;
        }else{
            $digitalProductt = 0;
        }

//        return $request->myfile;

        $data = ([
            "user_id" => auth()->id(),
            "name" => $request->name_en,
            "name_ar" => $request->name_ar,
            "price" => $request->price,
            "purchase_price" => $request->purchase_price,
            "sale_price" => $request->sale_price,
            "sku" => $request->sku,
            "stock_status" => $request->stock_status,
            "stock_quantity" => $request->stock_quantity,
            "weight" => $request->weight,
            "shipping" => $request->shipping,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "categories" => $categories,
            "digital_product" => $digitalProductt,
            "image" => "adsfads",
        ]);
        $product = Product::create($data);
        $digitalProduct = $request->digital_product;
        if ($product && $digitalProduct) {
            foreach ($request->codes as $key => $code) {
                if ($request['codes'][$key]) {
                    Code::create([
                        'code' => $request['codes'][$key],
                        'product_id' => $product->id,
                    ]);
                }
            }
        }

        if ($request->sizes) {
            foreach ($request->sizes as $key => $size) {
                if ($request['sizes'][$key]) {
                    ProductSize::create([
                        'product_id' => $product->id,
                        'size_id' => $request['sizes'][$key],
                        'price' => $request['size_price'][$key],
                    ]);
                }
            }
        }
         if ($request->cutting_method) {
        foreach ($request->cutting_method as $key => $cutting_method) {
            if ($request['cutting_method'][$key]) {
                ProductCutting::create([
                    'product_id' => $product->id,
                    'cutting_id' => $request['cutting_method'][$key],
                ]);
            }
        }
        }
         if ($request->packaging_method) {
        foreach ($request->packaging_method as $key => $packaging_method) {
            if ($request['packaging_method'][$key]) {
                ProductPacking::create([
                    'product_id' => $product->id,
                    'packing_id' => $request['packaging_method'][$key],
                ]);
            }
        }
        }

         if($data) return redirect('dashboard/products')->with('success','Successfully Add Product!');
         else return redirect('dashboard/products')->with('error','Something Went Wrong!');
//        return response()->json(
//            [
//                'message' => 'Added successfully',
//            ],
//            200
//        );
    }

    public function edit($id)
    {
//        $product = Product::findOrFail($id);
//        $productSizes = ProductSize::where('product_id', $id)->pluck('size_id');
//        $categories = DB::table('categories')->get();
//        $cutting = Cutting::all();
//        $packing = Packing::all();
//        $sizes = Size::whereNotIn('id',$productSizes)->get();

        $product = Product::with('sizes')->where('id', $id)->first();
        $data['product'] = $product;
        $data['images'] = [];
        if ($product->image != '') {
            $data['images'] = explode(',', $product->image);
        }
        $data['categories'] = DB::table('categories')->get();
        $data['cutting'] = Cutting::all();
        $data['packing'] = Packing::all();
        $data['sizes'] = Size::all();
        return view('dashboard.products.edit', $data);
    }

    public function update(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name_en' => 'required|max:190',
            'name_ar' => 'required|max:190',
            'description_en' => 'required',
            'description_ar' => 'required',
            'price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'stock_quantity' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
         

        /*$filename = null;
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(),
                [
                    'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()]);
            }

            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;

            $image->move('uploads/product_images/', $filename);

        }*/

        $categories = null;
        if ($request->has('categories')) {
            $categories = implode('|', $request->categories);
        }


        if ($request->digital_product){
            $digitalProductt = 1;
        }else{
            $digitalProductt = 0;
        }
        $data = ([
            "name" => $request->name_en,
            "name_ar" => $request->name_ar,
            "price" => $request->price,
            "purchase_price" => $request->purchase_price,
            "sale_price" => $request->sale_price,
            "sku" => $request->sku,
            "stock_status" => $request->stock_status,
            "stock_quantity" => $request->stock_quantity,
            "weight" => $request->weight,
            "shipping" => $request->shipping,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "categories" => $categories,
            "digital_product" => $digitalProductt,

        ]);
        

        $product = Product::findOrFail($request->prod_id);
        
        // saving images
        $productImages = explode(',', $product->image);
        $fileNames = [];
        
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file) {
                $validator = Validator::make($request->all(),
                [
                    'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                ]);

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->messages()]);
                }
                
                $extension = $file->getClientOriginalExtension();
                $fileName = uniqid() . '_' . time() . '.' . $extension;
                $file->move('uploads/product_images/', $fileName);
                $fileNames[] = $fileName;
            }
        } 
        
        if ($request->has('image_removed')) {
            $removedImages = explode(',', $request->image_removed);
            if (sizeof($removedImages)) {
                foreach($removedImages as $removedImage) {
                    // unlink('uploads/product_images/' . $removedImage); 
                }
            }
        }
        
        $imageFileNames = array_diff(array_merge($productImages, $fileNames), $removedImages);
        
        $data += ["image" => implode(',', $imageFileNames)];
        
        $product->update($data);
        if ($request->cutting_method) {
            ProductCutting::where('product_id', $request->prod_id)->delete();
            foreach ($request->cutting_method as $key => $cutting_method) {
                if ($request['cutting_method'][$key]) {
                    ProductCutting::create([
                        'product_id' => $request->prod_id,
                        'cutting_id' => $request['cutting_method'][$key],
                    ]);
                }
            }
        }
        if ($request->packaging_method) {
            ProductPacking::where('product_id', $request->prod_id)->delete();
            foreach ($request->packaging_method as $key => $packaging_method) {
                if ($request['packaging_method'][$key]) {
                    ProductPacking::create([
                        'product_id' =>$request->prod_id,
                        'packing_id' => $request['packaging_method'][$key],
                    ]);
                }
            }
        }
        if ($request->sizes) {
             ProductSize::where('product_id', $request->prod_id)->delete();
            foreach ($request->sizes as $key => $size) {
                if ($request['sizes'][$key]) {
                    ProductSize::create([
                        'product_id' => $request->prod_id,
                        'size_id' => $request['sizes'][$key],
                        'price' => $request['size_price'][$key],
                    ]);
                }
            }
        }
        return response()->json(
            [
                'message' => 'Updated successfully',
            ],
            200
        );
    }

    public function destroy(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $id = $request->id;
        Product::findOrFail($id)->delete();
        return response()->json(
            [
                'message' => 'Deleted',
            ],
            200
        );
    }

    public function codes(Request $request)
    {
        $id = $request->id;
        $codes = Code::where('product_id', $id)->get();
        $html = '';
        if (count($codes) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';

            if (app()->getLocale() == 'en') {
                $edit = 'edit';
                $del = 'delete';
            } else {
                $edit = 'تعديل';
                $del = 'حذف';
            }
            foreach ($codes as $key => $code) {

                $html .= '<tr><td>' . $counter++ . '</td><td class="code">' . $code->code . '</td><td><button data-deli="' . $code->code . '" data-id="' . $code->id . '" data-name="' . $code->code . '" class="btn btn-primary btn-sm edit_code">' . $edit . '</button></td><td><button data-id="' . $code->id . '" class="btn btn-danger btn-sm delete_code">' . $del . '</button></td></tr>';
            }
            $html .= '</div>';

        } else {
            $html = '<div class="modal-body">No Code Found!</div>';
        }
        echo $html;
    }
}
