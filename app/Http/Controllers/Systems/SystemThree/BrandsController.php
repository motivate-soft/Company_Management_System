<?php

namespace App\Http\Controllers\Systems\SystemThree;

use App\Model\System3_Brand;
use App\Model\System3_Category;
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
        $cuttings = System3_Brand::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\brands\index', compact('cuttings'));
    }

    public function add_brands(Request $request){

        $validator = Validator::make($request->all(),
            [
                'brandName' => 'required|string',
                'brandCode' => 'required|string',
                'category_type' => 'required|string',
            ]);


        $imgFile = $request->brandImage;
        $fileExtension = $imgFile->getClientOriginalExtension();
        if($fileExtension != "png" && $fileExtension != "jpg" && $fileExtension != "jpeg" && $fileExtension != "gif")
            return redirect()->back()->withErrors("error", "Not validate image");

        $imgFile->move("upload/Systems/SystemThree/Brands/", $request->brandName . ".". $fileExtension);
        $fileUrl = "upload/Systems/SystemThree/Brands/".$request->brandName . ".". $fileExtension;


        $data_added = DB::table('system3_brands')->insert([
            'brand_name' => $request->brandName,
            'brand_code' => $request->brandCode,
            'name_of_who_added' => auth()->user()->name,
            'date_of_addition' => now(),
            'category_type' => $request->categoryType,
            'brand_image' => $fileUrl,
        ]);

        if ($data_added) {
            return redirect('dashboard/brands')->with('success','Successfully Add Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        $categories = System3_Category::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\brands\create', compact('categories'));
    }

    public function edit($id)
    {
        $data = System3_Brand::findOrFail($id);
        $categories = System3_Category::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\brands\edit', compact('data', 'categories'));
    }

    public function detail_brand($id)
    {
        $data = System3_Brand::findOrFail($id);
        return view('dashboard\Systems\SystemThree\brands\detail', compact('data'));
    }

    public function edit_brand(Request $request){

        $validator = Validator::make($request->all(),
            [
                'brandName' => 'required|string',
                'brandCode' => 'required|string',
                'category_type' => 'required|string',
            ]);


        $imgFile = $request->brandImage;
        $fileExtension = $imgFile->getClientOriginalExtension();
        if($fileExtension != "png" && $fileExtension != "jpg" && $fileExtension != "jpeg" && $fileExtension != "gif")
            return redirect()->back()->withErrors("error", "Not validate image");

        $imgFile->move("upload/Systems/SystemThree/Brands/", $request->brandName . ".". $fileExtension);
        $fileUrl = "upload/Systems/SystemThree/Brands/".$request->brandName . ".". $fileExtension;


        $data_added = DB::table('system3_brands')->where('id',$request->brandId)->update([
            'brand_name' => $request->brandName,
            'brand_code' => $request->brandCode,
            'category_type' => $request->categoryType,
            'brand_image' => $fileUrl,
        ]);

        if ($data_added) {
            return redirect('dashboard/brands')->with('success','Successfully Update Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    public function delete_brand($id){
        $edit = DB::table('system3_brands')->where('id',$id)->first();
        if (!is_null($edit)) {
            DB::table('system3_brands')->where('id',$id)->delete();
            return redirect('dashboard/brands')->with('success','Successfully Delete Brand!');
        }else{
            return redirect('dashboard/brands')->with('error','Something Went Wrong!');
        }
    }

    /*=====  End of Brands  ======*/
}
