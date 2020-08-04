<?php
namespace App\Http\Controllers\dashboard\plugins;

use App\Model\Malath;
use App\Model\MyFatoorah;
use App\Model\Setting;
use App\Model\Size;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class PluginsController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
       $plugins = DB::table('plugins')->orderBy('id','DESC')->get();
       $malath = Malath::latest()->first();
        $MyFatoorah = MyFatoorah::latest()->first();
        return view('dashboard.plugins.index',compact('plugins','malath','MyFatoorah'));
    }

    public function get_add(){
        return view('dashboard.plugins.add');
    }

    public function add_plugin(Request $request){
        
        $validator = Validator::make($request->all(),
            [
                'name_en' => 'required|string|max:254',
                'name_ar' => 'required|string|max:254',
                'url' => 'required|string|max:254',
                'status' => 'required|string|max:254',
            ]);
        $filename = null;
         if ($request->hasFile('image')) {
                $validator = Validator::make($request->all(),
                [
                  'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                ]);
            
            if($validator->fails()){
               return redirect()->back()->with('error',$validator->errors()->first());
            }
  
          $image = $request->image;
          $extension = $image->getClientOriginalExtension(); 
          $filename = uniqid() . '_' . time() . '.' . $extension;

          $image->move('uploads/plugins_images/', $filename);  
           
          }

        $data_added = DB::table('plugins')->insert([
                'en_name' => $request->name_en,
                'ar_name' => $request->name_ar,
                'en_description' => $request->description_en,
                'ar_description' => $request->description_ar,
                'status' => $request->status,
                'url' => $request->url,
                'image' => $filename,
            ]);
        if ($data_added) {
            return redirect('plugins')->with('success','Plugin Added!');
        }else{  
            return redirect()->back()->with('error','Something Went Wrong!');
        }

    }

    public function edit_plugin(Request $request){
        
        $validator = Validator::make($request->all(),
            [  
                'name_en' => 'required|string|max:254',
                'name_ar' => 'required|string|max:254',
                'url' => 'required|string|max:254',
                'status' => 'required|string|max:254',
            ]);

         if ($request->hasFile('image')) {
            $filename = null;
                $validator = Validator::make($request->all(),
                [
                  'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                ]);
            
            if($validator->fails()){
               return redirect()->back()->with('error',$validator->errors()->first());
            }
  
          $image = $request->image;
          $extension = $image->getClientOriginalExtension(); 
          $filename = uniqid() . '_' . time() . '.' . $extension;

          $image->move('uploads/plugins_images/', $filename);  
           
           $data_added = DB::table('plugins')->where('id',$request->plug_id)->update([
                'en_name' => $request->name_en,
                'ar_name' => $request->name_ar,
                'en_description' => $request->description_en,
                'ar_description' => $request->description_ar,
                'status' => $request->status,
                'url' => $request->url,
                'image' => $filename,
            ]);
                if ($data_added) {
                    return redirect('plugins')->with('success','Plugin Updated!');
                }else{  
                    return redirect()->back()->with('error','Something Went Wrong!');
                }

          }else{

            $data_added = DB::table('plugins')->where('id',$request->plug_id)->update([
                'en_name' => $request->name_en,
                'ar_name' => $request->name_ar,
                'en_description' => $request->description_en,
                'ar_description' => $request->description_ar,
                'status' => $request->status,
                'url' => $request->url,
            ]);
                if ($data_added) {
                    return redirect('plugins')->with('success','Plugin Updated!');
                }else{  
                    return redirect()->back()->with('error','Something Went Wrong!');
                }
          }
    }

    public function plugin_status($id){
        
       $plugin = DB::table('plugins')->where('id',$id)->first();
        if ($plugin->status == 1) {
           $data_added = DB::table('plugins')->where('id',$id)->update([
                'status' => 0,
            ]);
            if ($data_added) {
                return redirect('dashboard/plugins')->with('success','Plugin Updated!');
            }else{  
                return redirect()->back()->with('error','Something Went Wrong!');
            }
        }else{
        $data_added = DB::table('plugins')->where('id',$id)->update([
                'status' => 1,
            ]);
            if ($data_added) {
                return redirect('dashboard/plugins')->with('success','Plugin Updated!');
            }else{  
                return redirect()->back()->with('error','Something Went Wrong!');
            }
        }
        
    }

    public function plugin_edit($id){
        
        $plugin = DB::table('plugins')->where('id',$id)->first();
        return view('dashboard.plugins.edit',compact('plugin'));
    }

    public function change_lng($locale){
        \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();    
    } 
    
    /*======================================================
    =               Payments Methods Start                 =
    ======================================================*/
    
        public function bank_rj()
        {
            return view('dashboard.plugins.payments.bank_rajhi');
        }
        
    /*======================================================
    =               Payments Methods END                   =
    ======================================================*/
    

}
