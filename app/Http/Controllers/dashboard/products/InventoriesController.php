<?php

namespace App\Http\Controllers\dashboard\products;

use App\Model\dashboard\productManagment\Inventory;
use App\Model\dashboard\productManagment\Category;
use App\Model\dashboard\productManagment\Brand;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoriesController extends Controller
{
    public $successStatus = 200;

    /*==================================
    =            Products            =
    ==================================*/

    public function index(){
        $cuttings = Inventory::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\index', compact('cuttings'));
    }

    public function add_products(Request $request){

        $validator = Validator::make($request->all(),
            [
                'productName' => 'required|string',
                'productCode' => 'required|string',
                'category_id' => 'required|string',
                'brand_id' => 'required|string',
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


        $inventory = new Inventory;
        $inventory->name = $request->productName;
        $inventory->code = $request->productCode;
        $inventory->category_id = $request->categoryId;
        $inventory->brand_id = $request->brandId;
        $inventory->country = $request->country;
        $inventory->image = $fileUrlImage;
        $inventory->pdf = $fileUrlPDF;
        $inventory->save();

        if ($inventory) {
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
        $data = Inventory::findOrFail($id);
        $categories = Category::orderBy('id', 'asc')->get();
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\edit', compact('data', 'categories', 'brands','sortnames', 'countries'));
    }

    public function detail_product($id)
    {
        $data = Inventory::findOrFail($id);
        return view('dashboard\Systems\SystemThree\products\detail', compact('data'));
    }

    public function edit_product(Request $request){

        $validator = Validator::make($request->all(),
            [
                'productName' => 'required|string',
                'productCode' => 'required|string',
                'category_id' => 'required|string',
                'brand_id' => 'required|string',
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


        $data_added = Inventory::where('id',$request->productId)->update([
            'name' => $request->productName,
            'code' => $request->productCode,
            'category_id' => $request->categoryId,
            'brand_id' => $request->brandId,
            'country' => $request->country,
            'image' => $fileUrlImage,
            'pdf' => $fileUrlPDF,
        ]);

        if ($data_added) {
            return redirect('dashboard/products')->with('success','Successfully Update Product!');
        }else{
            return redirect('dashboard/products')->with('error','Something Went Wrong!');
        }
    }

    public function delete_product(Request $request){
        $deleted = Inventory::where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }

    /*=====  End of Products  ======*/
}
