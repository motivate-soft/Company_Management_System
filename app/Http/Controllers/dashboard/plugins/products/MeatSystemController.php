<?php

namespace App\Http\Controllers\dashboard\plugins\products;

use App\Model\Cutting;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

class MeatSystemController extends Controller
{
    /*===============================
    =    Cutting Method  Starts     =
    ===============================*/
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cutting_index()
    {
        $cuttings = Cutting::all();
        return view('dashboard.plugins.applications.meatApplication.list-cutting',compact('cuttings'));
    }
    public function cutting_save(Request $request){
        $validator = Validator::make($request->all(),
            [
                'name_ar' => 'required|string|max:254',
                'name_en' => 'required|string|max:254',
                'price' => 'required|numeric',
            ]);
        $data_added = Cutting::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
        ]);
        if ($data_added) {
            return redirect('dashboard/plugins/systems/cutting-methods')->with('success','Successfully Add Cutting Method!');
        }else{
            return redirect('dashboard/plugins/systems/cutting-methods')->with('error','Something Went Wrong!');
        }
    }
    public function cutting_update(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name_ar' => 'required|string|max:254',
                'name_en' => 'required|string|max:254',
                'price' => 'required|numeric',
            ]);
        $packing = Cutting::findOrFail($request->cutting_method_id);
        $packing->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
        ]);
        return redirect('dashboard/plugins/systems/cutting-methods')->with('success', 'Successfully Update Cutting Method!');
    }
    public function cutting_delete($id)
    {
        $packing = Cutting::findOrFail($id);
        $packing->delete();
        return redirect('dashboard/plugins/systems/cutting-methods')->with('success', 'Successfully Delete Cutting Method!');
    }
    /*===============================
    =     Cutting Method  Ends      =
    ===============================*/
    /*===============================
    =    Cutting Packing  Starts    =
    ===============================*/
    public function packing_index()
    {
        $packing = Packing::all();
        return view('dashboard.plugins.applications.meatApplication.list-packing', compact('packing'));
    }
    public function packing_save(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name_ar' => 'required|string|max:254',
                'name_en' => 'required|string|max:254',
                'price' => 'required|numeric',
            ]);
        $data_added = Packing::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
        ]);
        if ($data_added) {
            return redirect('dashboard/plugins/systems/packing-methods')->with('success', 'Successfully Add Packing Method!');
        } else {
            return redirect('dashboard/plugins/systems/packing-methods')->with('error', 'Something Went Wrong!');
        }
    }
    public function packing_update(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name_ar' => 'required|string|max:254',
                'name_en' => 'required|string|max:254',
                'price' => 'required|numeric',
            ]);
        $packing = Packing::findOrFail($request->packing_method_id);
        $packing->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
        ]);
        return redirect('dashboard/plugins/systems/packing-methods')->with('success', 'Successfully Update Packing Method!');
    }
    public function packing_delete($id)
    {
        $packing = Packing::findOrFail($id);
        $packing->delete();
        return redirect('dashboard/plugins/systems/packing-methods')->with('success', 'Successfully Delete Packing Method!');
    }
    /*===============================
    =     Cutting Packing  Ends     =
    ===============================*/
    /*===============================
    =    Cutting Method  Starts     =
    ===============================*/

    public function sizes_index()
    {
        $sizes = Size::all();
        return view('dashboard.plugins.applications.meatApplication.sizes', compact('sizes'));
    }
    public function size_add(Request $request){
        $validator = Validator::make($request->all(),
        [
            'size' => 'required|string|max:254',
            'eng_name' => 'required|string|max:254',
        ]);
        $data_added = Size::create([
            'name_ar' => $request->size,
            'name_en' => $request->eng_name,
        ]);
        if ($data_added) {
            return redirect()->back()->with('success','size Added!');
        }else{  
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }
    public function size_del($id){
       $edit = DB::table('sizes')->where('id',$id)->first();
       if (!is_null($edit)) { 
            DB::table('sizes')->where('id',$id)->delete();
            return redirect()->back()->with('success','Size Deleted Successfully!'); 
       }else{
            return redirect()->back()->with('error','Something Went Wrong!');    
       }
    }
    public function edit_size(Request $request){
        $validator = Validator::make($request->all(),
        [
            'size' => 'required|string|max:254',
            'eng_name' => 'required|string|max:254',
        ]);
        $data_added = DB::table('sizes')->where('id',$request->size_id)->update([
            'name' => $request->size,
            'name_en' => $request->eng_name,
        ]);
        if ($data_added) {
            return redirect()->back()->with('success','Successfully Update Cutting Method!');
        }else{  
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    } 
    /*===============================
    =    Cutting Method  Starts     =
    ===============================*/
}
