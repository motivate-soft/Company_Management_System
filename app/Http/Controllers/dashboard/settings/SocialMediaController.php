<?php
namespace App\Http\Controllers\dashboard\settings;
use App\Model\Setting;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class SocialMediaController extends Controller
{
    public function save_social_links(Request $request){
 
        DB::table('config_settings')->where('_key','WhatsApp')->update(['_value' => $request->WhatsApp]);
        DB::table('config_settings')->where('_key','Twitter')->update(['_value' => $request->Twitter]);
        DB::table('config_settings')->where('_key','YouTube')->update(['_value' => $request->YouTube]);
        DB::table('config_settings')->where('_key','Instagram')->update(['_value' => $request->Instagram]);
        DB::table('config_settings')->where('_key','Facebook')->update(['_value' => $request->Facebook]);
 
        return redirect()->back()->with('success','Successfully Updated!'); 
    }  
     public function social_links(Request $request){
        $data['WhatsApp'] = DB::table('config_settings')->where('_key','WhatsApp')->first();
        $data['Twitter'] = DB::table('config_settings')->where('_key','Twitter')->first();
        $data['YouTube'] = DB::table('config_settings')->where('_key','YouTube')->first();
        $data['Instagram'] = DB::table('config_settings')->where('_key','Instagram')->first();
        $data['Facebook'] = DB::table('config_settings')->where('_key','Facebook')->first();
 
        if($request->header("accept") == 'application/json'){
            return response()->json(['links' => $data]);
        }
 
        return view('dashboard.settings.social-links',$data);
    }
}