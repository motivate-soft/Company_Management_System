<?php
namespace App\Http\Controllers\dashboard\customers;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public $successStatus = 200;

    
    public function index()
    {   
        $customers['customers'] = DB::table('users')->where('user_type','customer')->orderBy('id','desc')->get();
        return view('dashboard.customers.list',$customers);  
    }

    public function add(Request $request){
      dd($request->all());
      $request->validate([
            'email' => 'required|email|unique:users,email,unique:users',
            'phone' => 'required|string|unique:users,phone,unique:users',
            'name' => ['required','max:255'],
            'password' => ['required', 'string', 'min:8']
      ]);

      $if_phone_exists = DB::table('users')->where('phone',$request->phone)->first();

      if(!is_null($if_phone_exists)){    
        return redirect('add-customer')->with('error', 'Phone number already exists!');
      }

        $inserted = User::create([
              'password' => Hash::make($request->password),
              'name' => $request->name,
              'user_type' => 'customer',
              'phone' => $request->phone,
              'email' => $request->email,
              'notes' => $request->note,
              'status' => 1,
              'address' => $request->address  
            ]);
        if ($inserted) {
          return redirect('list-customers')->with('success', 'Customer Successfully Added!');
        }else{
          return redirect('list-customers')->with('error', 'Something Went Wrong!');
        }

    }

    public function customer_status(Request $request){
      
        $created = DB::table('users')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('users')->where('id', $request->id)->update(['status' => 1]);
        }else{
            DB::table('users')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function delete($id){
        $client = User::where('id',$id)->first();
        if (!is_null($client)) {
          $deleted = User::where('id',$id)->delete();
          if ($deleted) {
            return redirect('list-customers')->with('success', 'Customer Successfully Delete!');
          }else{
            return redirect('list-customers')->with('error', 'Something Went Wrong!');
          }
        }
        return redirect('list-customers')->with('error', 'Customer Not Found!');
    }

    public function del_product($id)
    {   
        $del_product = DB::table('products')->where('id',$id)->first();
        if(!is_null($del_product)){
            DB::table('products')->where('id',$id)->delete();
            return redirect()->back()->with('success','Product Successfully Delete!'); 
        }else{ 
            return redirect()->back()->with('error','Product not found!');
        }
    }

    public function add_product_view()
    {   
        return view('products.add');
    }

    /**
     * single product detail
     */
    public function product_detail(Request $request){

        $validator = Validator::make($request->all(),
        [
             'id' => 'required',
        ]);
        $attributeNames = array(
             'id' => 'Product ID Required',
        );
        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

          
          $product = DB::table('products')->where('id', $request->id)->first();

          if(!is_null($product)){
             if($request->header("Authorization")){
                return response()->json(['product' => $product],$this->successStatus);
            }
          }else{
             return response()->json(['error' => 'Product not found']);
          }
    }


    /**
     * Add product
     */
    public function add_product(Request $request)
    {   
        if($request->header("Authorization")){
            $request_data = json_decode( $request->data,true );
        }else{
            $request_data = $request->all();
        }
        
        $validator = Validator::make($request_data,
        [
             'name' => 'required|string|max:254',
             'price' => 'required|max:10',
             'packaging_method' => 'required',
             'cutting_method' => 'required',
             //'image' => 'required'
        ]);

        if($validator->fails()){
            if($request->header("Authorization")){
                return response()->json(['error'=>$validator->errors()],401);
            }else{
                return redirect()->back()->with('error',$validator->errors()->first());
            }
        }
        
        $filename = null;
         if ($request->hasFile('image')) {
                $validator = Validator::make($request->all(),
                [
                  'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                ]);
            
            if($validator->fails()){
                if($request->header("Authorization")){
                return response()->json(['error'=>$validator->errors()],401);
                }else{
                    return redirect()->back()->with('error',$validator->errors()->first());
                }
            }
  
          $image = $request->image;
          $extension = $image->getClientOriginalExtension(); 
          $filename = uniqid() . '_' . time() . '.' . $extension;

          $image->move('uploads/product_images/', $filename);
           
          }

        $userId = $request->user_id;
        
        if($request->header("Authorization")){
           $userId = $request->user()->id;
        } 

        $data = ([
            "user_id" => $userId,
            "name" => $request_data['name'],
            "price" => $request_data['price'],  
            "packaging_method" => $request_data['packaging_method'],  
            "cutting_method" => $request_data['cutting_method'],
            "image" => $filename
        ]);

        $count = DB::table('products')->where('user_id', $userId)->count();
        if($count >= 15){
            if($request->header("Authorization")){
                return response()->json(['error' => 'Your product limit reached.']);
            } 
            return redirect()->back()->with('error','This customer product limit reached.');
        }
        $created = DB::table('products')->insert($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect()->back()->with('success','Product Created');
        }else{
            if($request->header("Authorization")){
              return response()->json(['error'=>'Something went wrong!'],401);
            }
              return redirect()->back()->with('error','Something went wrong!');
        }
    }
    public function SendNotification()
    {
        return view('sendnotification');
    }
    public function PushNotification(Request $request)
    {
       $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'key='.$request->serverkey,
        ];

        $client = new Client([
            'headers' => $headers,
        ]);
        $dataArray = [
               "to" => "/topics/com.notification.firebasenotification",
               "notification" => [
               "body" => $request->notification,
               "title" =>$request->notificationtitle, 
               "content_available"=> true,
               "priority"=> "high",
             ],
             "data"=>[
                  "body" => $request->notification,
                  "title" =>$request->notificationtitle,
                  "content_available"=>true,
                  "priority"=>"high"  
              ],


             ];
             $fields = json_encode($dataArray);
            $res = $client->request('POST', 'https://fcm.googleapis.com/fcm/send', [
            'body'=>$fields,
        ]);
        if($res->getStatusCode()==200 && $res->getreasonPhrase()=="OK"){
            return redirect()->back()->with('success','Notification has been sent Successfully')->with('serverkey',$request->serverkey);
        }
        
    }

}
