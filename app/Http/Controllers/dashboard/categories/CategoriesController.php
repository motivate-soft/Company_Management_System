<?php
namespace App\Http\Controllers\dashboard\categories;
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
        return view('dashboard\categories\index', compact('cuttings'));
    }

    public function add_categories(Request $request){
      
        $validator = Validator::make($request->all(),
        [
            'categoryName' => 'required|string',
            'categoryCode' => 'required|string',
            'nameOfAdd' => 'required|string',
            'dateOfAdd' => 'required|timestamp',
        ]);

        $data_added = DB::table('system3_categories')->insert([
            'category_name' => $request->categoryName,
            'category_code' => $request->categoryCode,
            'name_of_who_added' => $request->nameOfAdd,
            'date_of_addition' => $request->dateOfAdd,
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
            'categoryName' => 'required|string',
            'categoryCode' => 'required|string',
            'nameOfAdd' => 'required|string',
            'dateOfAdd' => 'required|timestamp',
        ]);


        $data_added = DB::table('system3_categories')->where('id',$request->editid)->update([
            'category_name' => $request->categoryName,
            'category_code' => $request->categoryCode,
            'name_of_who_added' => $request->nameOfAdd,
            'date_of_addition' => $request->dateOfAdd,
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
