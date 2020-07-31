<?php
namespace App\Http\Controllers\dashboard\plugins\sms;

use App\Model\Malath;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MalathController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*========================================
    =        Malath SMS Gateway Start        =
    =        https://sms.malath.net.sa/      =
    ========================================*/
    public function malath_index()
    {
        $malath = Malath::latest()->first();
        return view('dashboard.plugins.malath.index', compact('malath'));
    }

    public function malath_store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required|max:90',
            'sender' => 'required|max:90',
            'password' => 'required|max:90',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        Malath::create([
            'username' => $request->username,
            'sender' => $request->sender,
            'password' => $request->password,
        ]);
        return response()->json(
            [
                'message' => 'Added successfully',
            ],
            200
        );
    }

    public function malath_changeStatus(){
        $malath = Malath::latest()->first();
        if ($malath->status){
            $active = false;
        }else{
            $active = true;
        }
        $malath->update([
            'status' => $active,
        ]);
        return response()->json(
            [
                'message' => 'Updated successfully',
            ],
            200
        );
    }

    public function malath_smsView()
    {
        $malath = Malath::latest()->first();
        $url = 'http://sms.malath.net.sa/api/getBalance.aspx?username=' . $malath->username . '&password=' . $malath->password . '';
        $client = new Client();
        $res = $client->post($url);
        $balance = $res->getBody();

        return view('dashboard.plugins.malath.send-sms',compact('malath','balance'));
    }

    public function malath_sendSMS(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'mobile_no' => 'required|max:90',
            'message' => 'required|max:90',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        $malath = Malath::latest()->first();
        $number = $request->mobile_no;
        $message = $request->message;
        $client = new Client();
        $url = 'http://sms.malath.net.sa/httpSmsProvider.aspx?username=' . $malath->username . '&password=' . $malath->password . '&mobile=' . $number . '&unicode=E&message=' . $message . '&sender=' . $malath->sender . '';

        $res = $client->post($url);
        $body = $res->getBody();

        return response()->json(
            [
                'message' => $body->read(3),
            ],
            200
        );

    }
    /*========================================
    =        Malath SMS Gateway Ends         =
    =        https://sms.malath.net.sa/      =
    ========================================*/
}
