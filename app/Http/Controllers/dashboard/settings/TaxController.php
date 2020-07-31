<?php
namespace App\Http\Controllers\dashboard\settings;
use App\Model\Setting;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class TaxController extends Controller
{
    
    public function vat_tax(){
        $tax = DB::table('config_settings')->where('_key','tax')->first();
        return view('dashboard.settings.tax',compact('tax'));
    }    
    public function save_vat_tax(Request $request){

        $tax = DB::table('config_settings')->where('_key','tax')->first();

        $data = ([
        '_key' => 'tax',
        '_value' => $request->tax,
        ]);
        
        if(!is_null($tax)){
            DB::table('config_settings')->where('_key','tax')->update($data);
            return redirect()->back()->with('success','Successfully Updated!'); 
        }
 
        $save = DB::table('config_settings')->insert($data);
        if($save) {  
            return redirect()->back()->with('success','Successfully Updated!'); 
        }else{
            return redirect()->back()->with('error','Something Went Wrong!');      
        }
    }
}