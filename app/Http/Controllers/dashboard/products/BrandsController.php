<?php

namespace App\Http\Controllers\dashboard\products;

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
        return view('dashboard/Systems/SystemThree/brands/index', compact('brands'));
    }

    public function add_brands(Request $request){

        $validator = Validator::make($request->all(),
            [
                'brandName' => 'required|string',
                'brandNameAr' => 'required|string',
                'brandCode' => 'required|string',
                'categoryType' => 'string',
            ]);

        $imgFile = $request->brandImage;
        $fileExtension = $imgFile->getClientOriginalExtension();
        if($fileExtension != "png" && $fileExtension != "jpg" && $fileExtension != "jpeg" && $fileExtension != "gif")
            return redirect()->back()->withErrors("error", "Not validate image");
    
        $imgFile->move("upload/Brands/", $request->brandName . ".". $fileExtension);
        $fileUrl = "upload/Brands/".$request->brandName . ".". $fileExtension;

        $brand = new Brand;
        $brand->name = $request->brandName;
        $brand->name_ar = $request->brandNameAr;
        $brand->code = $request->brandCode;
        $brand->created_by = auth()->user()->name;
        $brand->category_id = $request->categoryId;
        $brand->image = $fileUrl;
        $brand->save();

        if ($brand) {
            return redirect('dashboard/brands')->with('success','Successfully Add Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        $categories = Category::orderBy('id', 'asc')->get();
        return view('dashboard/Systems/SystemThree/brands/create', compact('categories'));
    }

    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        $categories = Category::orderBy('id', 'asc')->get();
        return view('dashboard/Systems/SystemThree/brands/edit', compact('data', 'categories'));
    }

    public function detail_brand($id)
    {
        $data = Brand::findOrFail($id);
        return view('dashboard/Systems/SystemThree/brands/detail', compact('data'));
    }

    public function edit_brand(Request $request){

        $validator = Validator::make($request->all(),
            [
                'brandName' => 'required|string',
                'brandNameAr' => 'required|string',
                'brandCode' => 'required|string',
                'categoryType' => 'string',
            ]);

        $brand = Brand::where('id', $request->brandId)->update([
            'name' => $request->brandName,
            'name_ar' => $request->brandNameAr,
            'code' => $request->brandCode,
            'category_id' => $request->categoryId,
        ]);

        if ($brand) {
            return redirect('dashboard/brands')->with('success','Successfully Update Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    public function delete_brand(Request $request){
        // $edit = DB::table('brands')->where('id',$id)->first();
        // if (!is_null($edit)) {
        //     DB::table('brands')->where('id',$id)->delete();
        //     return redirect('dashboard/brands')->with('success','Successfully Delete Brand!');
        // }else{
        //     return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        // }

        $brand = Brand::where('id', $request->id)->delete();
        if ($brand) {
            return 1;
        } else {
            return 0;
        }
    }

    /*=====  End of Brands  ======*/
}
