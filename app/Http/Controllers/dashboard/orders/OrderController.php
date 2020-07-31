<?php
namespace App\Http\Controllers\dashboard\orders;

use Illuminate\Http\Request;
use Validator;
use App\Model\Order;
use App\Model\Product;
use App\Model\OrderHis;
use DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{   
    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
    * Orders List
    */
    public function list(){
        
        $data['orders'] = DB::table('orders')->orderBy('id','desc')->paginate(10);
        return view('dashboard.orders.list',$data);
        
    }
    
    /*
    * View Order Details
    */
    public function view(Request $request,$id){
        
        $order = Order::find($id);
     
        $data['order'] = $order;
        $data['items'] = $order->carts;
        
        $data['image_path'] = url('uploads/product_images').'/';
        $data['products'] = Product::all();
        $data['history'] = OrderHis::with('user')->where('order_id', $id)->orderBy('updated_at', 'DESC')->get();
        //$data['tax'] = DB::table('config_settings')->where('_key','tax')->first();

        if($request->header("Content-Type") == 'application/json'){
            unset($data['order']['user']);   
            return response()->json($data);
        }else{
            return view('dashboard.orders.view',$data);
        }
 
    }

    /*
    * Create Order
    */
    public function create_order(Request $request){
        
        // $order_data = array(
        //     'order_details' => array(
        //     'user_id' => 1,
        //     'address_id' => 1,
        //     'payment_method' => 'Bank|Cash',
        //     'bank_id' => 3,
        //     'coupon_id' => 1,
        //     'sub_total' => 100,
        //     'vat' => 5,
        //     'total' => 200,
        //     'note' => 'Some note...',
        //     'delivery_date' => '2020-06-04',
        //     'delivery_time' => '10:00'
        //     ),
        //     'order_items' => array(
        //         array(
        //             'product_id' => 41,
        //             'size_id' => 8,
        //             'cutting_id' => 5,
        //             'packing_id' => 5,
        //             'qty' => 2,
        //        ),
        //         array(
        //             'product_id' => 42,
        //             'size_id' => 10,
        //             'cutting_id' => 13,
        //             'packing_id' => 1,
        //             'qty' => 3,
        //        )
        //     )
        // );
        
        $order_data = $request->all();

        $reg_order = [];

         foreach ($order_data['order_details'] as $key => $order) {

            $reg_order['user_id'] = $order_data['order_details']['user_id'];
            $reg_order['address_id'] = $order_data['order_details']['address_id'];
            $reg_order['payment_method'] = $order_data['order_details']['payment_method'];
            if($order_data['order_details']['payment_method'] == 'Bank'){
                $reg_order['bank_id'] = $order_data['order_details']['bank_id'];
            }
            $reg_order['coupon_id'] = $order_data['order_details']['coupon_id'];
            $reg_order['sub_total'] = $order_data['order_details']['sub_total'];
            $reg_order['vat'] = $order_data['order_details']['vat'];
            $reg_order['total'] = $order_data['order_details']['total'];
            $reg_order['note'] = $order_data['order_details']['note'];
            $reg_order['delivery_date'] = $order_data['order_details']['delivery_date'];
            $reg_order['delivery_time'] = $order_data['order_details']['delivery_time'];
          }

        $saved_order = \DB::table('orders')->insertGetId($reg_order);
        $get_order_data_back =  \DB::table('orders')->where('id',$saved_order)->first();

        if(!is_null($get_order_data_back)){
            $make_order_static = ([
                'user_static' => json_encode(get_user_by_id($get_order_data_back->user_id)),
                'address_static' => json_encode(get_user_address($get_order_data_back->address_id)),
                'bank_static' => json_encode(get_bank_details($get_order_data_back->bank_id)),
                'coupon_static' => $get_order_data_back->coupon_id
            ]);
            \DB::table('orders')->where('id',$saved_order)->update($make_order_static);
        }

        
        $reg_order_details = array();
        foreach ($order_data['order_items'] as $key => $details) {
                $reg_order_details[$key]['order_id'] = $saved_order; 
                $reg_order_details[$key]['product_id'] = $order_data['order_items'][$key]['product_id']; 
                $reg_order_details[$key]['size_id'] = $order_data['order_items'][$key]['size_id']; 
                $reg_order_details[$key]['cutting_id'] = $order_data['order_items'][$key]['cutting_id']; 
                $reg_order_details[$key]['packing_id'] = $order_data['order_items'][$key]['packing_id']; 
                $reg_order_details[$key]['qty'] = $order_data['order_items'][$key]['qty']; 
 
           }

        // $save_order_items = \DB::table('order_items')->insert($reg_order_details);
       
        // if($save_order_items){
        //     $get_order_items_back =  \DB::table('order_items')->where('order_id',$saved_order)->get();
        //     if(count($get_order_items_back)>0){
        //         $make_items_static = array();
        //         foreach ($get_order_items_back as $key => $get_order_item) { 

        //         $make_items_static = ([
        //             'product_static' => get_product_detail_for_order($get_order_item->product_id),
        //             'size_static'    => sizes_by_ids($get_order_item->size_id),
        //             'cutting_static' => cutting_method_by_ids($get_order_item->cutting_id),
        //             'packing_static' => packaging_method_by_ids($get_order_item->packing_id)
        //         ]);
  
        //         \DB::table('order_items')->where('id',$get_order_item->id)->update($make_items_static);
    
        //         }
        //     }
        // }

        if($request->header("Content-Type") == 'application/json'){
             return response()->json(['success' => 'Order Created'],$this->successStatus);
        }else{
            return redirect()->back()->with('success','Order Created Successfully!'); 
        }
    }

    /**
     * Order Tracking API Endpoint
     */     
    public function order_tracking(Request $request){
        
        $user_id = $request->user()->id;

        $order = DB::table('orders')
        ->where('id',$request->tracking_code)
        ->where('user_id',$user_id)
        ->first();
      
        if(!is_null($order)){
            if($request->header("Content-Type") == 'application/json'){
                return response()->json(['Status' => $order->status],$this->successStatus); 
            } 
        }else{
            if($request->header("Content-Type") == 'application/json'){
                return response()->json(['error' => 'Invalid tracking code']); 
            } 
        }
    }

    public function user_orders(Request $request){
        
        $user_id = $request->user()->id;

        $orders = DB::table('orders')
        ->where('user_id',$user_id)  
        ->get();
      
        if(count($orders) > 0){

            if($request->header("Content-Type") == 'application/json'){
 
        $order_arr = array();

        foreach ($orders as $keys => $order) {
        
        $order_arr['order_id'] = $order->id;
        $order_arr['pay_method'] = $order->payment_method;
        $order_arr['status'] = $order->status;
        $order_arr['sub_total'] = $order->sub_total;
        $order_arr['vat'] = $order->vat;
        $order_arr['total'] = $order->total;
        $order_arr['note'] = $order->note;
        $order_arr['delivery_date'] = $order->delivery_date;
        $order_arr['delivery_time'] = $order->delivery_time;
        $order_arr['created_at'] = $order->created_at;

        $bank = ''; $coupon = ''; $user = ''; $address = '';
                 
        if(!is_null($order->coupon_static)){
            $coupon = json_decode( $order->coupon_static, true );
        }            
        // if(!is_null($order->user_static)){
        //     $user = json_decode( $order->user_static, true );
        // }
        if(!is_null($order->address_static)){
            $address = json_decode( $order->address_static, true );
        }

        if($order->payment_method == 'Bank'){
            if(!is_null($order->bank_static)){
                $bank = json_decode( $order->bank_static, true );
            } 
            $order_arr['bank'] = $bank; 
        }
        if(!is_null($order->coupon_id)){
            $order_arr['coupon'] = $coupon;
        }
        
        //$order_arr['user']    = $user;
        $order_arr['address'] = $address;
         
        // $order_items = DB::table('order_items')->where('order_id',$order->id)->get();
        // $order_items_arr = array();
        // foreach ($order_items as $key => $items) {
        //     $product_static = '';
        //     if(!is_null($items->product_static)){
        //         $product_static = json_decode( $items->product_static, true );
        //     }
        //     $order_items_arr[$key]['item_id']     = $items->id;
        //     $order_items_arr[$key]['qty']     = $items->qty;
        //     $order_items_arr[$key]['product'] = $product_static;
        //     $order_items_arr[$key]['size']    = $items->size_static;
        //     $order_items_arr[$key]['cutting'] = $items->cutting_static;
        //     $order_items_arr[$key]['packing'] = $items->packing_static;
        // }

        // $data[$keys]['order'] = $order_arr;
        // $data[$keys]['items'] = $order_items_arr;
        
        //$data['tax'] = DB::table('config_settings')->where('_key','tax')->first();

        } // End Foreach Loop
        $data['image_path'] = url('uploads/product_images').'/';
        return response()->json($data);
         
        // return response()->json(['user_order_list' => $order],$this->successStatus); 

            } 
        }else{
            if($request->header("Content-Type") == 'application/json'){
                return response()->json(['error' => 'No Order Found']); 
            } 
        }
    }

    

    /*
    * Delete Order
    */
    public function delete_order($id){
       $delete_order = DB::table('orders')->where('id',$id)->first();
       if (!is_null($delete_order)) { 
            DB::table('orders')->where('id',$id)->delete();
            DB::table('order_items')->where('order_id',$id)->delete();
            return redirect()->back()->with('success','Order Deleted Successfully!'); 
       }else{
            return redirect()->back()->with('error','Order not found!');    
       }
    }    

    /*
    * Delete Order Item
    */
    public function delete_order_item($id){
       $delete_order_items = DB::table('order_items')->where('id',$id)->first();
       if (!is_null($delete_order_items)) { 
            DB::table('order_items')->where('id',$id)->delete();
            return redirect()->back()->with('success','Item Deleted Successfully!'); 
       }else{
            return redirect()->back()->with('error','Order item not found!');    
       }
    }

    /*
    * Delete Size
    */
    public function size_del($id){
       $edit = DB::table('sizes')->where('id',$id)->first();
       if (!is_null($edit)) { 
            DB::table('sizes')->where('id',$id)->delete();
            return redirect()->back()->with('success','Size Deleted Successfully!'); 
       }else{
            return redirect()->back()->with('error','Something Went Wrong!');    
       }
    }
    
    /*
    * Edit Size
    */
    public function edit_size(Request $request){
        $validator = Validator::make($request->all(),
        [
            'size' => 'required|string|max:254',
        ]);
        $data_added = DB::table('sizes')->where('id',$request->size_id)->update([
            'name' => $request->size 
        ]);
        if ($data_added) {
            return redirect()->back()->with('success','Successfully Update Cutting Method!');
        }else{  
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    } 

    /*
    * ADD Cutting Method
    */     
    public function add_cutting_method(Request $request){
       
        $validator = Validator::make($request->all(),
        [
            'cutting_method' => 'required|string|max:254',
        ]);

        $data_added = DB::table('cutting')->insert([
            'name' => $request->cutting_method 
        ]);

        if ($data_added) {
            return redirect('cutting-method')->with('success','Successfully Add Cutting Method!');
        }else{  
            return redirect('cutting-method')->with('error','Something Went Wrong!');
        }

    }

    /*
    * Edit Cutting Method
    */
    public function edit_cutting_method(Request $request){
        $validator = Validator::make($request->all(),
        [
            'cutting_method' => 'required|string|max:254',
        ]);

        $data_added = DB::table('cuttings')->where('id',$request->cutting_method_id)->update([
            'name' => $request->cutting_method 
        ]);

        if ($data_added) {
            return redirect('cutting-method')->with('success','Successfully Update Cutting Method!');
        }else{  
            return redirect('cutting-method')->with('error','Something Went Wrong!');
        }
    } 

    /*
    * Delete Cutting Method
    */
    public function delete_cutting($id){
       $edit = DB::table('cuttings')->where('id',$id)->first();
       if (!is_null($edit)) {
            DB::table('cuttings')->where('id',$id)->delete();
            return redirect('cutting-method')->with('success','Successfully Delete Cutting Method!'); 
       }else{
            return redirect('cutting-method')->with('error','Something Went Wrong!');    
       }
    }

    /*
    * Add Packing Method
    */
    public function add_packing_method(Request $request){  
       
        $validator = Validator::make($request->all(),
        [
            'cutting_method' => 'required|string|max:254',
        ]);

        $data_added = DB::table('packings')->insert([
            'name' => $request->cutting_method 
        ]);

        if ($data_added) {  
            return redirect('packing-method')->with('success','Successfully Add Packing Method!');
        }else{  
            return redirect('packing-method')->with('error','Something Went Wrong!');
        }

    }

    /*
    * Edit Packing Method
    */
    public function edit_packing_method(Request $request){
        $validator = Validator::make($request->all(),
        [
            'cutting_method' => 'required|string|max:254',
        ]);

        $data_added = DB::table('packings')->where('id',$request->cutting_method_id)->update([
            'name' => $request->cutting_method 
        ]);

        if ($data_added) {
            return redirect('packing-method')->with('success','Successfully Update Packing Method!');
        }else{  
            return redirect('packing-method')->with('error','Something Went Wrong!');
        }
    }  
 
    /*
    * Delete Packing Method
    */   
    public function delete_packing($id){
       $edit = DB::table('packings')->where('id',$id)->first();
       if (!is_null($edit)) {  
            DB::table('packings')->where('id',$id)->delete();  
            return redirect('packing-method')->with('success','Successfully Delete Packing Method!'); 
       }else{
            return redirect('packing-method')->with('error','Something Went Wrong!');      
       }
    }  

    /*
    * Add Bank
    */ 
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
            return redirect('bank-information')->with('success','Successfully Add Bank!');
        }else{  
            return redirect('bank-information')->with('error','Something Went Wrong!');
        }

    }

    /*
    * Edit Bank
    */ 
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
            return redirect('bank-information')->with('success','Successfully Update Bank!');
        }else{  
            return redirect('bank-information')->with('error','Something Went Wrong!');
        }
    }

    /*
    * Delete Bank
    */ 
    public function delete_bank($id){
       $edit = DB::table('bank')->where('id',$id)->first();
       if (!is_null($edit)) {  
            DB::table('bank')->where('id',$id)->delete();  
            return redirect('bank-information')->with('success','Successfully Delete Bank!'); 
       }else{
            return redirect('bank-information')->with('error','Something Went Wrong!');      
       }
    }
    

    /*
    * Change Order Status
    */ 
    public function change_order_status($id,Request $request){

       $order = DB::table('orders')->where('id',$id)->first();
       if (!is_null($order)) { 

        DB::table('orders')->where('id',$id)->update(['status'=>$request->status]);

        // Update order history logs
        $order_log = ([
            'order_id' => $id,
            'by_user' => \Auth::user()->id,
            'order_status' => 'Order status changed from '.$order->status.' to '.$request->status,
        ]);

        //DB::table('order_logs')->insert($order_log);
        
        $user = get_user_by_id($order->user_id); 
        $email = 'info@al-malki.co'; 
        $phone = '966555644047';
        $name = 'al-malki';
        if(!is_null($user)){
            $email = $user->email;
            $phone = $user->phone;
            $name = $user->name;
        }

        // if($request->via == 'email' || $request->via == 'both'){
        //     $data = array('specialMessage'=>$request->specialMessage,'status'=>$request->status);
        //     \Mail::send('emails.orderStatus', $data, function($message) use ($name,$email) {
        //     $message->to($email, $name)->subject('Order Status');
        //     $message->from('info@al-malki.co', 'al-malki.co');
        //     });
        // }
        
        // if($request->via == 'sms' || $request->via == 'both'){
        //     $message = 'Your order status now is '.$request->status;
        //     $message .= ' Special Note: '.$request->specialMessage; 
        //     send_sms($phone,$message);
        // }       
            return redirect()->back()->with('success','Order status updated!'); 
       }else{
            return redirect('bank-information')->with('error','Something Went Wrong!');      
       }
    }

    public function updateProductsOnOrder(Request $request) {

        // order_id: "5"
        // product_checked: ["on"]
        // product_ids: (2) ["57", "58"]
        // product_quantity: (2) ["1", "1"]
        // product_total_price: (2) ["222", "150"]
        // selected: ["on", "off"]

        $orderId = $request->order_id;

        $order = Order::find($orderId);

        $productIds = $request->product_ids;
        $quantities = $request->product_quantity;
        $product_selected = $request->selected;
        $prices = $request->product_total_price;

        foreach($productIds as $key=>$productId) {
            if(isset($product_selected[$key]) && $product_selected[$key] == 'on') {
                $quantity = $quantities[$key];
                $price = $prices[$key];
                if (!$quantity || $quantity == '0') continue;

                $oldCart = \DB::table('carts')->where('order_id', $orderId)->where('product_id', $productId)->first();
                
                $product = Product::find($productId);
                if (isset($oldCart) && $oldCart->quantity != $quantity) {
                    $content = $product->name.': quantity '.$oldCart->quantity.' is changed to '.$quantity;
                    $this->recordOrderHistory($orderId,  $content);
                } else if (!isset($oldCart))  {
                    $content = $product->name.', quantity '.$quantity.' is created';
                    $this->recordOrderHistory($orderId,  $content);
                }

                \DB::table('carts')->updateOrInsert([
                    'order_id' => $orderId,
                    'product_id' => $productId
                ], [
                    'order_id' => $orderId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                    'user_id' => $order->user_id
                ]);

            } else {
                
                $oldCart = \DB::table('carts')->where('order_id', $orderId)->where('product_id', $productId)->first();
                if (isset($oldCart)) {
                    
                    \DB::table('carts')->where('order_id', $orderId)->where('product_id', $productId)->delete();
                    $product = Product::find($productId);
                    $content = $product->name.' is deleted';
                    $this->recordOrderHistory($orderId,  $content);
                }
                
            }
        }

        return 'success';
    }

    public function updateNoteOnOrder(Request $request) {
        $note = $request->note;
        $orderId = $request->order_id;
        $old_note = Order::find($orderId)->note;
        \DB::table('orders')->where('id', $orderId)->update([
            'note' => $note
        ]);

        if (empty($old_note)) {
            $this->recordOrderHistory($orderId, '"'.$note.'" created newly');
        } else {
            $this->recordOrderHistory($orderId, '"'.$old_note.'"updated to "'.$note.'"');
        }
        return 'success';
    }

    public function recordOrderHistory($order_id, $content){
        $data = [
            'order_id' => $order_id,
            'content' => $content,
            'user_id' => \Auth::user()->id,
        ];
        $orderHistory = new OrderHis($data);
        $orderHistory->save();
    }



      
}
