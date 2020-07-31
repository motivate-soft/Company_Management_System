<?php
namespace App\Http\Controllers\dashboard\pages;
use App\Model\Setting;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    public function policy(Request $request){
        $data['help_en'] = DB::table('config_settings')->where('_key','help_en')->first();
        $data['help_ar'] = DB::table('config_settings')->where('_key','help_ar')->first();
        $data['privacy_en'] = DB::table('config_settings')->where('_key','privacy_en')->first();
        $data['privacy_ar'] = DB::table('config_settings')->where('_key','privacy_ar')->first();
        
        if($request->header("accept") == 'application/json'){
            return response()->json(['links' => $data]);
        }
        return view('dashboard.settings.help-privacy',$data);
    } 
 
    public function save_policy(Request $request){

        DB::table('config_settings')->where('_key','help_en')->update(['_value' => $request->help_en]);
        DB::table('config_settings')->where('_key','help_ar')->update(['_value' => $request->help_ar]);
        DB::table('config_settings')->where('_key','privacy_en')->update(['_value' => $request->privacy_en]);
        DB::table('config_settings')->where('_key','privacy_ar')->update(['_value' => $request->privacy_ar]);
 
        return redirect()->back()->with('success','Successfully Updated!'); 
    }  
}