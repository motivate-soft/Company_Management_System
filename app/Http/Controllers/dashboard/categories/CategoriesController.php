<?php
namespace App\Http\Controllers\dashboard\categories;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class CategoriesController  extends Controller
{
    public $successStatus = 200;

    /*==================================
    =            Categories            =
    ==================================*/
    
    public function add_categories(Request $request){
      
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:254',
            'name_ar' => 'required|string|max:254',
            'parent' => 'required',
        ]);

        $data_added = DB::table('categories')->insert([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'parent' => $request->parent 
        ]);

        if ($data_added) {
            return redirect('dashboard/categories')->with('success','Successfully Add Category!');
        }else{  
            return redirect('dashboard/categories')->with('error','Something Went Wrong!');
        }
    }

    public function edit_category(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|max:254',
            'name_ar' => 'required|string|max:254',
            'parent' => 'required',
        ]);

        $data_added = DB::table('categories')->where('id',$request->cutting_method_id)->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'parent' => $request->parent 
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
