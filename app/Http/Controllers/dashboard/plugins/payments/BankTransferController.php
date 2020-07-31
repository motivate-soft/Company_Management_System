<?php
namespace App\Http\Controllers\dashboard\plugins\payment;
use App\Model\Setting;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class BankTransferController extends Controller
{
    public function add_bank(Request $request){
        
        $validator = Validator::make($request->all(),
        [
            'bank_name_eng' => 'required|string|max:254',
            'bank_name_ar' => 'required|string|max:254',
            'acc_number' => 'required|string|max:254',
            'iban' => 'required|string|max:254',
        ]);

        $data_added = DB::table('bank')->insert([
            'name' => $request->bank_name_eng, 
            'ar_name' => $request->bank_name_ar, 
            'acc_number' => $request->acc_number, 
            'iban' => $request->iban
        ]);

        if ($data_added) {
            return redirect('dashboard/bank-information')->with('success','Successfully Add Bank!');
        }else{  
            return redirect('dashboard/bank-information')->with('error','Something Went Wrong!');
        }

    }

    public function edit_bank(Request $request){

        $validator = Validator::make($request->all(),
        [
            'bank_name_eng' => 'required|string|max:254',
            'bank_name_ar' => 'required|string|max:254',
            'acc_number' => 'required|string|max:254',
            'iban' => 'required|string|max:254',
        ]);

        $data_added = DB::table('bank')->where('id',$request->cutting_method_id)->update([
            'name' => $request->bank_name_eng, 
            'ar_name' => $request->bank_name_ar, 
            'acc_number' => $request->acc_number, 
            'iban' => $request->iban
        ]);

        if ($data_added) {
            return redirect('dashboard/bank-information')->with('success','Successfully Update Bank!');
        }else{  
            return redirect('dashboard/bank-information')->with('error','Something Went Wrong!');
        }
    }

    public function delete_bank($id){
       $edit = DB::table('bank')->where('id',$id)->first();
       if (!is_null($edit)) {  
            DB::table('bank')->where('id',$id)->delete();  
            return redirect('dashboard/bank-information')->with('success','Successfully Delete Bank!'); 
       }else{
            return redirect('dashboard/bank-information')->with('error','Something Went Wrong!');      
       }
    }   
}
