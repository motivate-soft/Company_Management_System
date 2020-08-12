<?php

namespace App\Http\Controllers\dashboard\products;

use App\Model\dashboard\productManagment\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public $successStatus = 200;

    /*==================================
    =            Categories            =
    ==================================*/

    public function index(){
        $cuttings = Category::orderBy('id', 'asc')->get();
        return view('dashboard/Systems/SystemThree/categories/index', compact('cuttings'));
    }

    public function add_categories(Request $request){

        $validator = Validator::make($request->all(),
            [
                'categoryName' => 'required|string',
                'categoryNameAr' => 'required|string',
                'categoryCode' => 'required|string',
            ]);

        $category = new Category;
        $category->name = $request->categoryName;
        $category->name_ar = $request->categoryNameAr;
        $category->code = $request->categoryCode;
        $category->created_by = auth()->user()->name;
        $category->save();

        if ($category) {
            return redirect('dashboard/categories')->with('success','Successfully Add Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function create(){
        return view('dashboard/Systems/SystemThree/categories/create');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('dashboard/Systems/SystemThree/categories/edit', compact('data'));
    }

    public function detail_category($id)
    {
        $data = Category::findOrFail($id);
        return view('dashboard/Systems/SystemThree/categories/detail', compact('data'));
    }

    public function edit_category(Request $request){

        $validator = Validator::make($request->all(),
            [
                'categoryName' => 'required|string',
                'categoryNameAr' => 'required|string',
                'categoryCode' => 'required|string',
            ]);

        
        $category = Category::where('id', $request->categoryId)->update([
            'name' => $request->categoryName,
            'name_ar' => $request->categoryNameAr,
            'code' => $request->categoryCode,
        ]);

        if ($category) {
            return redirect('dashboard/categories')->with('success','Successfully Update Category!');
        }else{
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function delete_category(Request $request){
        $category = Category::where('id', $request->id)->delete();
        if ($category) {
            return 1;
        } else {
            return 0;
        }
    }

    /*=====  End of Categories  ======*/
}
