<?php

namespace App\Http\Controllers\Systems\SystemThree;

use App\Model\System3_Category;
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
        $cuttings = System3_Category::orderBy('id', 'asc')->get();
        return view('dashboard\Systems\SystemThree\categories\index', compact('cuttings'));
    }

    public function add_categories(Request $request){

        $validator = Validator::make($request->all(),
            [
                'categoryName' => 'required|string',
                'categoryCode' => 'required|string',
            ]);

        $data_added = DB::table('system3_categories')->insert([
            'category_name' => $request->categoryName,
            'category_code' => $request->categoryCode,
            'name_of_who_added' => auth()->user()->name,
            'date_of_addition' => now(),
        ]);

        if ($data_added) {
            return redirect('dashboard/categories')->with('success','Successfully Add Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        return view('dashboard\Systems\SystemThree\categories\create');
    }

    public function edit($id)
    {
        $data = System3_Category::findOrFail($id);
        return view('dashboard\Systems\SystemThree\categories\edit', compact('data'));
    }

    public function detail_category($id)
    {
        $data = System3_Category::findOrFail($id);
        return view('dashboard\Systems\SystemThree\categories\detail', compact('data'));
    }

    public function edit_category(Request $request){

        $validator = Validator::make($request->all(),
            [
                'categoryName' => 'required|string',
                'categoryCode' => 'required|string',
            ]);


        $data_added = DB::table('system3_categories')->where('id',$request->categoryId)->update([
            'category_name' => $request->categoryName,
            'category_code' => $request->categoryCode,
        ]);

        if ($data_added) {
            return redirect('dashboard/categories')->with('success','Successfully Update Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function delete_category($id){
        $edit = DB::table('system3_categories')->where('id',$id)->first();
        if (!is_null($edit)) {
            DB::table('system3_categories')->where('id',$id)->delete();
            return redirect('dashboard/categories')->with('success','Successfully Delete Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    /*=====  End of Categories  ======*/
}
