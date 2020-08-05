<?php

namespace App\Http\Controllers\dashboard\products;

use App\Model\System3_Product;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //
    public $successStatus = 200;

    /*==================================
    =            Products            =
    ==================================*/

    public function index(){
        $cuttings = System3_Product::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\index', compact('cuttings'));
    }

    public function add_products(Request $request){

        $validator = Validator::make($request->all(),
            [
                'productName' => 'required|string',
                'productCode' => 'required|string',
                'category_type' => 'required|string',
                'brand_type' => 'required|string',
                'country' => 'required|string',
            ]);

        $imgFile = $request->productImage;
        $fileExtension = $imgFile->getClientOriginalExtension();
        if($fileExtension != "png" && $fileExtension != "jpg" && $fileExtension != "jpeg" && $fileExtension != "gif")
            return redirect()->back()->with('error','Not validate image');

        $imgFile->move("upload/Systems/SystemThree/Products/", $request->productName . ".". $fileExtension);
        $fileUrlImage = "upload/Systems/SystemThree/Products/".$request->productName . ".". $fileExtension;


        $pdfFile = $request->productPDF;
        $fileExtension = $pdfFile->getClientOriginalExtension();
        if($fileExtension != "pdf") return redirect()->back()->with('error', 'Not validate pdf');
        $pdfFile->move("upload/Systems/SystemThree/Products/", $request->productName.".". $fileExtension);
        $fileUrlPDF = "upload/Systems/SystemThree/Products/".$request->productName.".". $fileExtension;


        $data_added = DB::table('system3_products')->insert([
            'product_name' => $request->productName,
            'product_code' => $request->productCode,
            'name_of_who_added' => auth()->user()->name,
            'date_of_addition' => now(),
            'category_type' => $request->categoryType,
            'brand_type' => $request->brandType,
            'country_of_origin' => $request->country,
            'product_image' => $fileUrlImage,
            'product_pdf' => $fileUrlPDF,
        ]);

        if ($data_added) {
            return redirect('dashboard/products')->with('success','Successfully Add Product!');
        }else{
            return redirect('dashboard/products')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        $sortnames = Country::orderBy('id', 'asc')->distinct()->get('sortname');
        $countries = Country::orderBy('id', 'asc')->get();
        $categories = Category::orderBy('id', 'asc')->get();
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\create', compact('categories', 'brands', 'sortnames', 'countries'));
    }

    public function edit($id)
    {
        $sortnames = Country::orderBy('id', 'asc')->distinct()->get('sortname');
        $countries = Country::orderBy('id', 'asc')->get();
        $data = System3_Product::findOrFail($id);
        $categories = Category::orderBy('id', 'asc')->get();
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\edit', compact('data', 'categories', 'brands','sortnames', 'countries'));
    }

    public function detail_product($id)
    {
        $data = System3_Product::findOrFail($id);
        return view('dashboard\Systems\SystemThree\products\detail', compact('data'));
    }

    public function edit_product(Request $request){

        $validator = Validator::make($request->all(),
            [
                'productName' => 'required|string',
                'productCode' => 'required|string',
                'category_type' => 'required|string',
                'brand_type' => 'required|string',
                'country' => 'required|string',
            ]);


        $imgFile = $request->productImage;
        $fileExtension = $imgFile->getClientOriginalExtension();
        if($fileExtension != "png" && $fileExtension != "jpg" && $fileExtension != "jpeg" && $fileExtension != "gif")
            return redirect()->back()->withErrors("error", "Not validate image");

        $imgFile->move("upload/Systems/SystemThree/Products/", $request->productName . ".". $fileExtension);
        $fileUrlImage = "upload/Systems/SystemThree/Products/".$request->productName . ".". $fileExtension;


        $pdfFile = $request->productPDF;
        $fileExtension = $pdfFile->getClientOriginalExtension();
        if($fileExtension != "pdf") return redirect()->back()->withErrors("error", "Not validate pdf");
        $pdfFile->move("upload/Systems/SystemThree/Products/", $request->productName.".". $fileExtension);
        $fileUrlPDF = "upload/Systems/SystemThree/Products/".$request->productName.".". $fileExtension;


        $data_added = DB::table('system3_products')->where('id',$request->productId)->update([
            'product_name' => $request->productName,
            'product_code' => $request->productCode,
            'name_of_who_added' => $request->nameOfAdd,
            'date_of_addition' => $request->dateOfAdd,
            'category_type' => $request->categoryType,
            'brand_type' => $request->brandType,
            'country_of_origin' => $request->country,
            'product_image' => $fileUrlImage,
            'product_pdf' => $fileUrlPDF,
        ]);

        if ($data_added) {
            return redirect('dashboard/products')->with('success','Successfully Update Product!');
        }else{
            return redirect('dashboard/products')->with('error','Something Went Wrong!');
        }
    }

    public function delete_product(Request $request){
        $deleted = DB::table('system3_products')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }

    /*=====  End of Products  ======*/
}
