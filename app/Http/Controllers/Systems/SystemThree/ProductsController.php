<?php

namespace App\Http\Controllers\Systems\SystemThree;

use App\Model\System3_Brand;
use App\Model\System3_Category;
use App\Model\System3_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
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
                'nameOfAdd' => 'required|string',
                'dateOfAdd' => 'required|date',
                'category_type' => 'required|string',
                'brand_type' => 'required|string',
                'country' => 'required|string',
            ]);

        $data_added = DB::table('system3_products')->insert([
            'product_name' => $request->productName,
            'product_code' => $request->productCode,
            'name_of_who_added' => $request->nameOfAdd,
            'date_of_addition' => $request->dateOfAdd,
            'category_type' => $request->categoryType,
            'brand_type' => $request->brandType,
            'country_of_origin' => $request->country,
        ]);

        if ($data_added) {
            return redirect('dashboard/products')->with('success','Successfully Add Product!');
        }else{
            return redirect('dashboard/products')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        $categories = System3_Category::orderBy('id', 'asc')->get();
        $brands = System3_Brand::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\create', compact('categories', 'brands'));
    }

    public function edit($id)
    {
        $data = System3_Product::findOrFail($id);
        $categories = System3_Category::orderBy('id', 'asc')->get();
        $brands = System3_Brand::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\products\edit', compact('data', 'categories', 'brands'));
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
                'nameOfAdd' => 'required|string',
                'dateOfAdd' => 'required|date',
                'category_type' => 'required|string',
                'brand_type' => 'required|string',
                'country' => 'required|string',
            ]);


        $data_added = DB::table('system3_products')->where('id',$request->productId)->update([
            'product_name' => $request->productName,
            'product_code' => $request->productCode,
            'name_of_who_added' => $request->nameOfAdd,
            'date_of_addition' => $request->dateOfAdd,
            'category_type' => $request->categoryType,
            'brand_type' => $request->brandType,
            'country_of_origin' => $request->country,
        ]);

        if ($data_added) {
            return redirect('dashboard/products')->with('success','Successfully Update Product!');
        }else{
            return redirect('dashboard/products')->with('error','Something Went Wrong!');
        }
    }

    public function delete_product($id){
        $edit = DB::table('system3_products')->where('id',$id)->first();
        if (!is_null($edit)) {
            DB::table('system3_products')->where('id',$id)->delete();
            return redirect('dashboard/products')->with('success','Successfully Delete Product!');
        }else{
            return redirect('dashboard/products')->with('error','Something Went Wrong!');
        }
    }

    /*=====  End of Products  ======*/
}
