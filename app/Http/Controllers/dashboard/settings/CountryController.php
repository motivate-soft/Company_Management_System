<?php
namespace App\Http\Controllers\dashboard\settings;

use Illuminate\Http\Request;
use Validator;  
use DB;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public $successStatus = 200;

    
    public function get_countries(){
        $countries = DB::table('countries')->orderBy('id','desc')->get();
        return view('dashboard.settings.countries.list',compact('countries'));
    }

    public function add_country(){
        return view('dashboard.settings.countries.add');
    }

    public function post_add_country(Request $request){
        
        $request->validate([
            'country_name' => ['required','max:255'],
            'ar_country_name' => ['required','max:255'],
            // 'short_code' => ['required','max:255'],
            'country_code' => ['required','max:255']
        ]);

        $id = DB::table('countries')->insertGetId([
                'name' => $request->country_name,
                'ar_name' => $request->ar_country_name,
                // 'sortname' => $request->short_code,
                'phonecode' => $request->country_code
        ]); 

        // $state_id = DB::table('states')->insertGetId([
        //         'name' => $request->state_name,
        //         'ar_name' => $request->ar_state_name,
        //         'delievery_fee' => $request->delivery_fee,
        //         'country_id' => $id 
        // ]);

        // if ($request->city_name) {

        //     DB::table('cities')->insertGetId([
        //         'name' => $request->city_name,
        //         'ar_name' => $request->ar_city_name, 
        //         'delivery_fee' => $request->delivery_city,  
        //         'state_id' => $state_id
        //     ]);

        // }
       
        return redirect('dashboard/countries')->with('success','Country Successfully Added!');
      
    }
    

    public function get_states($id){  
      
        $states = get_country_states($id);  
        $html = '';
        if (count($states) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';
            $citie = '';

            if (app()->getLocale() == 'en') {
                $edit = 'edit';
                $citie = 'cities';
                $del = 'delete';
            }else{
                $edit = 'تعديل المحافظة';
                $citie = 'المدن';
                $del = 'حذف';
            }
            foreach ($states as $key => $state) {
                
                $html .='<tr><td>'.$counter++.'</td><td>'.get_state_name($state->id).'</td><td>'.$state->ar_name.'</td><td>'.$state->delievery_fee.'</td><td><button data-id="'.$state->id.'" class="get_cities btn btn-dark btn-sm" data-states="'.get_state_name($state->id).'">'.$citie.'</button></td><td><button data-deli="'.$state->delievery_fee.'" data-name="'.get_state_name($state->id).'" data-ar="'.$state->ar_name.'" data-id="'.$state->id.'" class="btn btn-primary btn-sm edit_states">'.$edit.'</button></td><td><button data-id="'.$state->id.'" class="btn btn-danger btn-sm delete_state">'.$del.'</button></td></tr>';      
            }
            $html .= '</div>';          
  
        }else{  
            $html ='<div class="modal-body">No State Found!</div>';      
        }
        echo $html;
    }

    public function all_get_state($id){
        $states = get_country_states($id);  
        $html = '';  
        if (count($states) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';
            $citie = '';

            if (app()->getLocale() == 'en') {
                $edit = 'edit';
                $citie = 'cities';
                $del = 'delete';
            }else{
                $edit = 'تعديل المحافظة';
                $citie = 'المدن';
                $del = 'حذف';
            }
            foreach ($states as $key => $state) {
                
                $html .='<tr><td>'.$counter++.'</td><td>'.get_state_name($state->id).'</td><td>'.$state->ar_name.'</td><td>'.$state->delievery_fee.'</td><td><button data-id="'.$state->id.'" class="get_cities btn btn-dark btn-sm" data-states="'.get_state_name($state->id).'">'.$citie.'</button></td><td><button data-deli="'.$state->delievery_fee.'" data-name="'.get_state_name($state->id).'" data-ar="'.$state->ar_name.'" data-id="'.$state->id.'" class="btn btn-primary btn-sm edit_states">'.$edit.'</button></td><td><button data-id="'.$state->id.'" class="btn btn-danger btn-sm delete_state">'.$del.'</button></td></tr>';      
            }
            $html .= '</div>';          
  
        }else{  
            $html ='<div class="modal-body">No State Found!</div>';      
        }
        echo $html;
    }

    public function post_edit_countries(Request $request){
         
        $update = DB::table('countries')->where('id',$request->country_id)->update([
                'name' => $request->country_name,
                'ar_name' => $request->ar_country_name,
                'phonecode' => $request->country_code
        ]);   
        if ($update) {  
            return redirect('dashboard/countries')->with('success','Country Successfully Updates!');
           
        }
    }

    public function delete_country($id){
        
        $states = DB::table('states')->where('country_id',$id)->get();
        if (count($states) > 0) {
            foreach ($states as $key => $state) {
                DB::table('cities')->where('state_id',$state->id)->delete();
            }

            foreach ($states as $key => $state) {
                 DB::table('states')->where('id',$state->id)->delete();
            }
        }

        $country = DB::table('countries')->where('id',$id)->delete();
        if ($country) {
            return redirect('dashboard/countries')->with('success','Country Successfully Deleted!');
        }
    }
    

    public function post_edit_states(Request $request){
        
        $update = DB::table('states')->where('id',$request->state_id)->update([
                'name' => $request->state_name,
                'ar_name' => $request->ar_state_name,
                'delievery_fee' => $request->delievery_fee,
        ]); 
        if ($update) {
            // return redirect('admin/countries')->with('success','State Successfully Updates!');
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'State Successfully Updates!'
            ));
        }
    }


    public function get_cities($id){  
      
        $cities = get_state_cities($id);
        $html = '';
        if (count($cities) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';
            $Neighborhood = '';

            if (app()->getLocale() == 'en') {
                $edit = 'edit';
                $Neighborhood = 'Neighborhood';
                $del = 'delete';
            }else{
                $edit = 'تعديل المدينة';
                $Neighborhood = 'الأحياء';
                $del = 'حذف';
            }
            foreach ($cities as $key => $city) {
                
                $html .='<tr><td>'.$counter++.'</td><td>'.get_city_name($city->id).'</td><td>'.$city->ar_name.'</td><td>'.$city->delivery_fee.'</td><td><button data-id="'.$city->id.'" class="get_neiber btn btn-dark btn-sm" data-neiber="'.$city->name.'">'.$Neighborhood.'</button><td><button edit-id="'.$city->id.'" ar-name="'.$city->ar_name.'" data-name="'.get_city_name($city->id).'" class="btn btn-primary btn-sm edit_cities" data-deli="'.$city->delivery_fee.'">'.$edit.'</button></td><td><button del-id="'.$city->id.'" class="btn btn-danger btn-sm del_citie">'.$del.'</button></td></tr>';      
            }
            $html .= '</div>';  

        }else{
            $html ='<div class="modal-body">No City Found!</div>';
        }
        echo $html;
    }


    public function all_get_cities($id){  
      
        $cities = get_state_cities($id);
        $html = '';
        if (count($cities) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';
            $Neighborhood = '';

            if (app()->getLocale() == 'en') {
                $edit = 'edit';
                $Neighborhood = 'Neighborhood';
                $del = 'delete';
            }else{
                $edit = 'تعديل المدينة';
                $Neighborhood = 'الأحياء';
                $del = 'حذف';
            }
            foreach ($cities as $key => $city) {
                
                $html .='<tr><td>'.$counter++.'</td><td>'.get_city_name($city->id).'</td><td>'.$city->ar_name.'</td><td>'.$city->delivery_fee.'</td><td><button data-id="'.$city->id.'" class="get_neiber btn btn-dark btn-sm" data-neiber="'.$city->name.'">'.$Neighborhood.'</button><td><button edit-id="'.$city->id.'" ar-name="'.$city->ar_name.'" data-name="'.get_city_name($city->id).'" class="btn btn-primary btn-sm edit_cities" data-deli="'.$city->delivery_fee.'">'.$edit.'</button></td><td><button del-id="'.$city->id.'" class="btn btn-danger btn-sm del_citie">'.$del.'</button></td></tr>';      
            }
            $html .= '</div>';  

        }else{
            $html ='<div class="modal-body">No City Found!</div>';
        }
        echo $html;
    }


    public function get_neiber($id){  
      
        $cities = DB::table('neighborhood')->where('city_id',$id)->get();
        $html = '';
        if (count($cities) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';
            

            if (app()->getLocale() == 'en') {
                $edit = 'edit';
               
                $del = 'delete';
            }else{
                $edit = 'تعديل الحي';
               
                $del = 'حذف';
            }
            foreach ($cities as $key => $city) {
                
                $html .='<tr><td>'.$counter++.'</td><td>'.$city->name.'</td><td>'.$city->ar_name.'</td><td>'.$city->deliery_fee.'</td><td><button edit-id="'.$city->id.'" ar-name="'.$city->ar_name.'" data-name="'.$city->name.'" class="btn btn-primary btn-sm edit_neibri" data-deli="'.$city->deliery_fee.'">'.$edit.'</button></td><td><button del-idb="'.$city->id.'" class="btn btn-danger btn-sm del_neibri">'.$del.'</button></td></tr>';        
            }
            $html .= '</div>';  

        }else{
            $html ='<div class="modal-body">No Neighborhood Found!</div>';
        }
        echo $html;
    }
    
    public function all_get_nebri($id){  
      
        $cities = DB::table('neighborhood')->where('city_id',$id)->orderBy('id','DESC')->get();
        $html = '';
        if (count($cities) > 0) {
            $html .= '<div class="modal-body">';
            $counter = 1;
            $edit = '';
            $del = '';
            if (app()->getLocale() == 'en') {
                $edit = 'edit';
               
                $del = 'delete';
            }else{
                $edit = 'تعديل الحي';
               
                $del = 'حذف';
            }
            foreach ($cities as $key => $city) {
                
                $html .='<tr><td>'.$counter++.'</td><td>'.$city->name.'</td><td>'.$city->ar_name.'</td><td>'.$city->deliery_fee.'</td><td><button edit-id="'.$city->id.'" ar-name="'.$city->ar_name.'" data-name="'.$city->name.'" class="btn btn-primary btn-sm edit_neibri" data-deli="'.$city->deliery_fee.'">'.$edit.'</button></td><td><button del-idb="'.$city->id.'" class="btn btn-danger btn-sm del_neibri">'.$del.'</button></td></tr>';        
            }
            $html .= '</div>';  

        }else{
            $html ='<div class="modal-body">No Neighborhood Found!</div>';  
        }
        echo $html;
    }


    public function delete_states($id){
        
        $cities = DB::table('cities')->where('state_id',$id)->get();
        if (count($cities) > 0) {
            foreach ($cities as $key => $city) {
                DB::table('cities')->where('id',$city->id)->delete();
            }
        }

        $states = DB::table('states')->where('id',$id)->delete();
        if ($states) {
            // return redirect('admin/countries')->with('success','State Successfully Deleted!');
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'State Successfully Deleted!'
            ));
        }
    }

    public function delete_city($id){
        
        $cities = DB::table('neighborhood')->where('city_id',$id)->get();
        if (count($cities) > 0) {
            foreach ($cities as $key => $city) {
                DB::table('neighborhood')->where('id',$city->id)->delete();
            }
        }
        $states = DB::table('cities')->where('id',$id)->delete();
        if ($states) {
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'City Successfully Deleted!'
            ));
        }
    }


    public function delete_neiber($id){
        
        $states = DB::table('neighborhood')->where('id',$id)->delete();
        if ($states) {
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'Neighborhood Successfully Deleted!'
            ));
        }
    }  


    public function post_edit_city(Request $request){
        
        $update = DB::table('cities')->where('id',$request->city_id)->update([
                'name' => $request->city_name,
                'ar_name' => $request->ar_city_name,  
                'delivery_fee' => $request->delievery_fee,  
        ]); 
        if ($update) {
            // return redirect('admin/countries')->with('success','State Successfully Updates!');
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'City Successfully Updates!'
            ));
        }
    }

    public function post_add_city (Request $request){
    
        $insert = DB::table('cities')->insert([
                'name' => $request->city_name,
                'ar_name' => $request->ar_city_name,
                'state_id' => $request->state_id,
                'delivery_fee' => $request->delievery_fee,
        ]); 
        if ($insert) {
        
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'City Successfully Added!'
            ));
            return redirect('dashboard/countries')->with('success','Country Successfully Updates!');
        }
    }


    public function edit_neiber(Request $request){
        
        $update = DB::table('neighborhood')->where('id',$request->neiber_id)->update([
                'name' => $request->neighborhood_name,
                'ar_name' => $request->ar_neighborhood_name,  
                'deliery_fee' => $request->delievery_fee,  
        ]); 
        if ($update) {
            // return redirect('admin/countries')->with('success','State Successfully Updates!');
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'Neighborhood Successfully Updates!'
            ));
        }
    }

    
    public function add_neiber(Request $request){
    
        $insert = DB::table('neighborhood')->insert([
                'name' => $request->neighborhood_name,
                'ar_name' => $request->ar_neighborhood_name,
                'city_id' => $request->neiber_id,  
                'deliery_fee' => $request->delievery_fee,
        ]); 
        if ($insert) {
        
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'Neighborhood Successfully Added!'
            ));
        }
    }

    

    public function post_add_state(Request $request){
        // dd($request->all());
        $insert = DB::table('states')->insert([
                'name' => $request->state_name,
                'ar_name' => $request->ar_state_name,
                'country_id' => $request->country_id,
                'delievery_fee' => $request->delievery_fee,
        ]); 
        if ($insert) {
            // return redirect('admin/countries')->with('success','State Successfully Updates!');
            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'State Successfully Added!'
            ));
        }
    }


    /*
    * Country list API Endpoint
    */
    public function get_country_list(){  
        $countries = DB::table('countries')->get();  
        return response()->json(['countries' => $countries]); 
    }

    /*
    * State List by Country id API Endpoint
    */
    public function get_states_by_country($id){  
        $states = get_country_states($id);  
        return response()->json(['states' => $states]);
    }

    /*
    * Cities List by state id API Endpoint
    */
    public function get_cities_by_state($id){  
        $cities = get_state_cities($id);  
        return response()->json(['cities' => $cities]);
    }

    /*
    * Neighborhood List by city id API Endpoint
    */
    public function get_neighborhood_by_city($id){  
        $neighborhood = DB::table('neighborhood')->where('city_id',$id)->get();  
        return response()->json(['neighborhoods' => $neighborhood]);
    }  


    public function _get_countries($id){    

        $states = DB::table('states')->where('country_id',$id)->get();
        $html = '';
        foreach ($states as $key => $state) {
            $html .='<option value="'.$state->id.'">'.$state->name.'</option>';
        }
        echo $html;
    }   

    

    public function get_zones_ala($id){    

        $states = DB::table('cities')->where('state_id',$id)->get();
        $html = '';
        foreach ($states as $key => $state) {
            $html .='<option value="'.$state->id.'">'.$state->name.'</option>';
        }
        echo $html;
    }

    public function get_neighborhood_ala($id){    

        $states = DB::table('neighborhood')->where('city_id',$id)->get();
        $html = '';
        foreach ($states as $key => $state) {
            $html .='<option value="'.$state->id.'">'.$state->name.'</option>';
        }
        echo $html;  
    }


    // Delivery Fee Api Endpoint
    public function delivery_fee(Request $request){

        $delivery_fee = 0;
        $user_addres = DB::table('user_addresses')->where('id',$request->id)->first();
        if(!is_null($user_addres)){

            if($user_addres->cityId > 0 && $user_addres->neighborhoodId < 1){
                $tbl_cities = DB::table('cities')->where('id',$user_addres->cityId)->first(); 
                if(!is_null($tbl_cities)){
                    $delivery_fee = $tbl_cities->delivery_fee;
                }
            }

            if($user_addres->cityId < 1 && $user_addres->neighborhoodId < 1){
                $states = DB::table('states')->where('id',$user_addres->stateId)->first(); 
                if(!is_null($states)){
                    $delivery_fee = $states->delievery_fee;
                }
            }

            if($user_addres->neighborhoodId > 1){
                $neighborhood = DB::table('neighborhood')->where('id',$user_addres->neighborhoodId)->first(); 
                if(!is_null($neighborhood)){
                    $delivery_fee = $neighborhood->deliery_fee;
                }
            }
            
            return response()->json(['deliveryFee' => $delivery_fee]);
        }else{
            return response()->json(['error' => 'Address not found']);
        }
    }


}
