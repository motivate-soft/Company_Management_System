<?php 
use App\Model\Product;
use App\Model\Order;

function demo_helper()
{
    echo "helper called";
}

function get_user_by_id($id){
	$user = \DB::table('users')->where('id',$id)->first();
	if(!is_null($user)){
		return $user;
	}else{
		return NULL;
	}
}

function get_packaging_method($id){
	$tbl_packing = \DB::table('packings')->where('id',$id)->first();
	if(!is_null($tbl_packing)){
		return $tbl_packing;
	}else{
		return NULL;
	}
}

function get_all_countries(){
    $countries = DB::table('countries')->get();  
    $html = '';
    foreach ($countries as $key => $country) {
        $html .='<option data-code="'.$country->phonecode.'" value="'.$country->id.'"  >'.$country->name.'</option>';
    }
    echo $html;
  }

function packaging_method_by_ids($ids){
	$idss = explode('|', $ids);
	$tbl_packing = \DB::table('packings')->whereIn('id',$idss)->select('name','en_name')->get()->toArray();
	if(count($tbl_packing)){
		if (app()->getLocale() == 'en') {
           return implode(',', array_column($tbl_packing, 'en_name'));
        }else{
           return implode(',', array_column($tbl_packing, 'name'));
        }
	}else{
		return NULL;
	}
}

function cutting_method_by_ids($ids){
	$idss = explode('|', $ids);
	$tbl_cutting = \DB::table('cuttings')->whereIn('id',$idss)->select('name','en_name')->get()->toArray();
	if(count($tbl_cutting)){

		if (app()->getLocale() == 'en') {
           return implode(',', array_column($tbl_cutting, 'en_name'));
        }else{
           return implode(',', array_column($tbl_cutting, 'name'));
        }
 
	}else{
		return NULL;
	}
}

function sizes_by_ids($ids){
	$idss = explode('|', $ids);
	$tbl_sizes = \DB::table('sizes')->whereIn('id',$idss)->select('name','name_en')->get()->toArray();
 
	if(count($tbl_sizes)){

		if (app()->getLocale() == 'en') {
           return implode(',', array_column($tbl_sizes, 'name_en'));
        }else{
           return implode(',', array_column($tbl_sizes, 'name'));
        }
	}else{
		return NULL;
	}
}

function get_cutting_method($id){
	$tbl_cutting = \DB::table('cuttings')->where('id',$id)->first();
	if(!is_null($tbl_cutting)){
		return $tbl_cutting;
	}else{
		return NULL;
	}
}

function get_cutting_packaging_loop($table){
	$table_data = \DB::table($table)->get();
	return  $table_data;
}

function get_shop_keeper_list(){
	$shop_keepers = \DB::table('users')->where('user_type','shop')->get();
	return  $shop_keepers; 
}

function get_city_list(){
	$cities = \DB::table('cities')->get();
	return  $cities; 
}

function get_user_address($id){
	$user_address = \DB::table('user_addresses')->where('id',$id)->first();
	if(!is_null($user_address)){
 
	$address = ([	
	  "id" => $user_address->id,
	  "user_id" => $user_address->user_id,
	  "name" => $user_address->name,
	  "type" => $user_address->type,
	  "country" => get_country_name($user_address->countryId),
	  "state" => get_state_name($user_address->stateId),
	  "city" => get_city_name($user_address->cityId),
	  "neighborhood" => get_neighborhood_name($user_address->neighborhoodId),
	  "address" => $user_address->address,
	  "mobile" => $user_address->mobile
	  ]);

		return $address;
	}else{
		return NULL;
	}
}

function get_bank_details($id){
	$bank_information = \DB::table('bank')->where('id',$id)->first();
	if(!is_null($bank_information)){
		return $bank_information;
	}else{
		return NULL;
	}
}

function get_product_detail_for_order($id){
	$product = \DB::table('products')->where('id',$id)->first();
	if(!is_null($product)){
	  	$return_data = ([
		  "id" => $product->id,
		  "name" => $product->name,
		  "name_ar" => $product->name_ar,
		  "price" => $product->price,
		  "sale_price" => $product->sale_price,
		  "packaging_method" => packaging_method_by_ids($product->packaging_method),
		  "cutting_method" => cutting_method_by_ids($product->cutting_method),
		  "sizes" => sizes_by_ids($product->sizes),
		  "sku" => $product->sku,
		  "weight" => $product->weight,
		  "shipping" => $product->shipping,
		  "image" => $product->image,
		  "description_en" => $product->description_en,
		  "description_ar" => $product->description_ar,
		  "created_at" => $product->created_at,
	  	]);
	  	return json_encode( $return_data );
	}else{
		return NULL;
	}
}

function get_country_states($cid){
    $states = DB::table('states')->where('country_id',$cid)->orderBy('id','DESC')->get();
    return $states;
}

function get_country_name($id){
    $country = DB::table('countries')->where('id',$id)->first();
    if(!is_null($country)){
      return $country->name;
    }
}

function get_state_name($id){
    $state = DB::table('states')->where('id',$id)->first();
    if(!is_null($state)){
      return $state->name;
    }
}

function get_state_cities($sid){
    $cities = DB::table('cities')->where('state_id',$sid)->orderBy('id','DESC')->get();
    return $cities;
}

function get_city_name($id){
    $city = DB::table('cities')->where('id',$id)->first();
    if(!is_null($city)){
      return $city->name;
    }
}

function get_neighborhood_name($id){
    $neighborhood = DB::table('neighborhood')->where('id',$id)->first();
    if(!is_null($neighborhood)){
      return $neighborhood->name;
    }
}


/*
* Send SMS API
*/
function send_sms($phone,$message){

		$api_username = $_ENV['SMS_API_USERNAME'];
		$api_password = $_ENV['SMS_API_PASSWORD'];
		$api_sender = $_ENV['SMS_API_SENDER'];

		  $curl = curl_init();
		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://www.alsaad2.net/api/sendsms.php?username="
		  .$api_username."&password=".$api_password."&message=".urlencode($message)."&numbers=".urlencode($phone)."&sender=".$api_sender."&return=json",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER =>0,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		 
		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  $result = json_decode( $response, true );
		  return $result;
		}
 }


function get_plugin_if_active($id){
	$plugin = DB::table('plugins')->where('id',$id)->first();
	if (!is_null($plugin)) {
		return $plugin;
	}
}

function category_parent($parent){
	if($parent == 0){
		return "Main";
	}
	return \App\Model\Category::Find($parent)->name;
}

function product_notif(){
	$product_notif=Product::where('stock_quantity' , '<', 5)->get();
	return $product_notif;
}

function order_notif(){
	$order_notif=Order::where('is_notif',0)->get();
	return $order_notif;
}