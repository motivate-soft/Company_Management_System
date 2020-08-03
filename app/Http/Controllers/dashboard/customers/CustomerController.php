<?php
namespace App\Http\Controllers\dashboard\customers;
use App\Model\Customers;
use App\Model\purchases;
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
        $customers['customers'] = Customers::all();
        return view('dashboard.customers.index', $customers);
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store(Request $request){

        $inserted = ([
            'sales_employee'=> $request->salesemployee,
            'nickname' => $request->nickname,
            'customer_name' => $request->name,
            'entity_type' => $request->entrytype,
            'entity_name' => $request->entryname,
            'position' => $request->position,
            'mobile_number' => $request->mobilenumber,
            'landline_number' => $request->landlinenumber,
//          'status' => 1,
            'fax' => $request->fax,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'city' => $request->city,
            'district' => $request->district,
            'street' => $request->street,
            'address' => $request->address,
            ]);
        $data = Customers::create($inserted);
        if ($data) {
          return redirect('dashboard/customers')->with('success', 'Customer Successfully Added!');
        }else{
          return redirect('dashboard/customers')->with('error', 'Something Went Wrong!');
        }
    }

    public function destroy($id){
        $client = Customers::where('id', $id)->first();

        if ($client) {
          $deleted = Customers::where('id',$id)->delete();
          if ($deleted) {
            return redirect('dashboard/customers')->with('success', 'Customer Successfully Delete!');
          }else{
            return redirect('dashboard/customers')->with('error', 'Something Went Wrong!');
          }
        }
        return redirect('dashboard/customers');
    }

    /**
     * single customer detail
     */
    public function edit ($id) {
        $customer = Customers::where('id', $id)->first();
        return view('dashboard.customers.edit', [ 'customer' => $customer ]);
    }

    public function update(Request $request, $id)
    {
        /*$filename = null;
        if ($request->hasFile('image')) {
            $validator = Validator::make($request->all(),
                [
                    'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
                ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()]);
            }

            $image = $request->image;
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid() . '_' . time() . '.' . $extension;

            $image->move('uploads/product_images/', $filename);

        }*/

        $data = ([
            'id' => $id,
            'sales_employee'=> $request->salesemployee,
            'nickname' => $request->nickname,
            'customer_name' => $request->name,
            'entity_type' => $request->entrytype,
            'entity_name' => $request->entryname,
            'position' => $request->position,
            'mobile_number' => $request->mobilenumber,
            'landline_number' => $request->landlinenumber,
//          'status' => 1,
            'fax' => $request->fax,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'city' => $request->city,
            'district' => $request->district,
            'street' => $request->street,
            'address' => $request->address,
        ]);


        $customer = Customers::where('id', $id)->first();

        // saving images
//        $customerImages = explode(',', $customer->image);
//        $fileNames = [];
//
//        if ($request->hasFile('images')) {
//            $files = $request->file('images');
//            foreach($files as $file) {
//                $validator = Validator::make($request->all(),
//                    [
//                        'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000',
//                    ]);
//
//                if ($validator->fails()) {
//                    return response()->json(['errors' => $validator->messages()]);
//                }
//
//                $extension = $file->getClientOriginalExtension();
//                $fileName = uniqid() . '_' . time() . '.' . $extension;
//                $file->move('uploads/product_images/', $fileName);
//                $fileNames[] = $fileName;
//            }
//        }
//
//        if ($request->has('image_removed')) {
//            $removedImages = explode(',', $request->image_removed);
//            if (sizeof($removedImages)) {
//                foreach($removedImages as $removedImage) {
//                    // unlink('uploads/product_images/' . $removedImage);
//                }
//            }
//        }
//
//        $imageFileNames = array_diff(array_merge($customerImages, $fileNames), $removedImages);
//
//        $data += ["image" => implode(',', $imageFileNames)];

        $customer -> update($data);

        return redirect('dashboard/customers')->with('success', 'Customer Successfully Updated!');
    }

    public function profile ($id) {
        $purchases = Purchases::where('customer_id', $id)->get();

        return view('dashboard.customers.profile', compact('purchases'));
    }

    public function purchases () {

        $purchases['purchases'] = Purchases::all();

        return view('dashboard.customers.purchases', $purchases);
    }

    public function disbursements () {
        $customers['customers'] = Purchases::all();
        return view('dashboard.customers.disbursements', $customers);
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
