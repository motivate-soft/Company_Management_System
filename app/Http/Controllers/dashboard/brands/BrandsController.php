<?php

namespace App\Http\Controllers\dashboard\brands;

use App\Model\dashboard\productManagment\Brand;
use App\Model\dashboard\productManagment\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public $successStatus = 200;

    /*==================================
    =            Brands            =
    ==================================*/

    public function index(){
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('dashboard/brands/index', compact('brands'));
    }

    public function add_brands(Request $request){

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'name_ar' => 'required|string',
                'code' => 'required|string',
                'category_type' => 'string',
            ]);

        $data_added = DB::table('brands')->insert([
            'name' => $request->brandName,
            'name_ar' => $request->brandNameAr,
            'code' => $request->brandCode,
            'created_by' => auth()->user()->name,
            'category_type' => $request->categoryType,
        ]);

        if ($data_added) {
            return redirect('dashboard/brands')->with('success','Successfully Add Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        $categories = Category::orderBy('id', 'asc')->get();
        return view('dashboard/brands/create', compact('categories'));
    }

    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        $categories = Category::orderBy('id', 'asc')->get();
        return view('dashboard/brands/edit', compact('data', 'categories'));
    }

    public function detail_brand($id)
    {
        $data = Brand::findOrFail($id);
        return view('dashboard/brands/detail', compact('data'));
    }

    public function edit_brand(Request $request){

        $validator = Validator::make($request->all(),
            [
                'brandName' => 'required|string',
                'brandNameAr' => 'required|string',
                'brandCode' => 'required|string',
                'nameOfAdd' => 'required|string',
                'dateOfAdd' => 'required|date',
                'category_type' => 'string',
            ]);


        $data_added = DB::table('brands')->where('id',$request->brandId)->update([
            'name' => $request->brandName,
            'name_ar' => $request->brandNameAr,
            'code' => $request->brandCode,
            'created_by' => $request->nameOfAdd,
            'category_type' => $request->categoryType,
        ]);

        if ($data_added) {
            return redirect('dashboard/brands')->with('success','Successfully Update Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    public function delete_brand($id){
        $edit = DB::table('brands')->where('id',$id)->first();
        if (!is_null($edit)) {
            DB::table('brands')->where('id',$id)->delete();
            return redirect('dashboard/brands')->with('success','Successfully Delete Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    /*=====  End of Brands  ======*/
}
