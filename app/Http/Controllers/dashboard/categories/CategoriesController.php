<?php

namespace App\Http\Controllers\dashboard\categories;

use App\Model\dashboard\productManagment\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Controllers\Controller;

class CategoriesController  extends Controller
{
    public $successStatus = 200;

    /*==================================
    =            Categories            =
    ==================================*/

    public function index(){
        $cuttings = Category::orderBy('id', 'asc')->get();
        return view('dashboard/categories/index', compact('cuttings'));
    }

    public function add_categories(Request $request){

        $validator = Validator::make($request->all(),
            [
                'categoryName' => 'required|string',
                'categoryNameAr' => 'required|string',
                'categoryCode' => 'required|string',
            ]);

        $data_added = DB::table('categories')->insert([
            'name' => $request->categoryName,
            'name_ar' => $request->categoryNameAr,
            'code' => $request->categoryCode,
            'created_by' => auth()->user()->name,
        ]);

        if ($data_added) {
            return redirect('dashboard/categories')->with('success','Successfully Add Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        return view('dashboard/categories/create');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('dashboard/categories/edit', compact('data'));
    }

    public function detail_category($id)
    {
        $data = Category::findOrFail($id);
        return view('dashboard/categories/detail', compact('data'));
    }

    public function edit_category(Request $request){

        $validator = Validator::make($request->all(),
            [
                'categoryName' => 'required|string',
                'categoryNameAr' => 'required|string',
                'categoryCode' => 'required|string',
            ]);


        $data_added = DB::table('categories')->where('id',$request->categoryId)->update([
            'name' => $request->categoryName,
            'name_ar' => $request->categoryNameAr,
            'code' => $request->categoryCode,
            'created_by' => auth()->user()->name,
        ]);

        if ($data_added) {
            return redirect('dashboard/categories')->with('success','Successfully Update Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function delete_category($id){
        $edit = DB::table('categories')->where('id',$id)->first();
        if (!is_null($edit)) {
            DB::table('categories')->where('id',$id)->delete();
            return redirect('dashboard/categories')->with('success','Successfully Delete Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    /*=====  End of Categories  ======*/
}
