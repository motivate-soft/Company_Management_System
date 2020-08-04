<?php

namespace App\Http\Controllers\frontend;

use App\Model\City;
use App\Model\Country;
use App\Model\Neighborhood;
use App\Model\Order;
use App\Model\Plugin;
use App\Model\State;
use App\Model\UserAddress;
use App\Model\VerifyUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['CheckAuth', 'CheckPhoneVerified'])->only('account', 'updateAccount');
    }

    public function updateAccount(Request $request)
    {
        $id = auth()->id();
        $file = request('photo');
        if ($file) {
            $validator = \Validator::make(request()->all(), [
                'photo' => 'required|mimes:jpeg,svg,png,jpg',
            ]);
        } else {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => "required|max:190|unique:users,email,$id,id",
                'phone' => "max:13|unique:users,phone,$id,id",
                'password_confirmation' => Rule:: requiredIf($request->password) . '|same:password',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return response()->json(['errors' => "error"]);
        }
        $user = User::find($id);
        $current_password = $user->password;
        $new_password = $request->password;

        if (!empty(request('password'))) {
            $new_password = bcrypt($request->Input('password'));
        } else {
            $new_password = $current_password;
        }

        $current_image = $user->photo;

        if (request('photo')) {
            $image = rand() . time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/users', $image);
            $file = $image;
        } else {
            $file = $current_image;
        }

        $input = $request->only('name', 'password', 'phone', 'photo', 'email');
        $input['password'] = $new_password;
        $input['photo'] = $file;
        $user->update($input);

        return response()->json(
            [
                'message' => 'done',
            ],
            200
        );
    }

    public function loginView()
    {
        if (!Auth::check()) {
            return view('frontend.main.auth.login');
        } else {
            return redirect()->home();
        }
    }

    public function registerView()
    {
        return view('frontend.main.auth.register');
    }

    public function profileView()
    {
        $WhatsApp = DB::table('config_settings')->where('_key', 'WhatsApp')->first();
        return view('frontend.main.auth.profile.index', compact('WhatsApp'));
    }

    public function account()
    {
        return view('frontend.themes.mobile_themes.theme_1.auth.account');
    }

    public function verifyView()
    {
        $alsaad = Plugin::where('id', 1)->first();
        if (Auth::check() && $alsaad->status == 1) {
            if (Auth::user()->phone_verefied == 0) {
                    $digits = 4;
                    $code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                    VerifyUser::create([
                        'user_id' => Auth::user()->id,
                        'code' => $code
                    ]);
                    $message = "Verification Code: " . $code;
                    $client = new Client();
                    $url = 'http://www.alsaad2.net/api/sendsms.php?username=alsaad101&password=123456&message=' . $message . '&numbers=966' . Auth::user()->phone . '&sender=School&u%20nicode=e&Rmduplicated=1&return=json';

                    $res = $client->post($url);
                    $body = json_decode($res->getBody());

                    SMSResponse::create([
                        'code' => $body->Code,
                        'message' => $body->MessageIs,
                        'phone' => Auth::user()->phone,
                        'user_id' => Auth::user()->id,
                    ]);

                return view('frontend.themes.mobile_themes.theme_1.auth.verify');
            } else {
                return redirect()->home();
            }
        }
        return redirect()->home();
    }

    public function verifyPhone(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'code.*' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        $user = auth()->user();
        $code = '';
        foreach ($request->code as $item) {
            $code .= $item;
        }
        $verify = VerifyUser::where('code', $code)->where('user_id', $user->id)->latest()->first();
        if ($verify) {
            $user->update([
                'phone_verefied' => 1
            ]);
            return response()->json(
                [
                    'message' => 'Verified successfully',
                ],
                200
            );
        } else {
            return response()->json(['errors' => "error"]);
        }
    }

    public function addresses()
    {
        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        return view('frontend.themes.mobile_themes.theme_1.auth.addresses.index', compact('addresses'));
    }

    public function createAddress()
    {
        $countries = Country::all();
        return view('frontend.themes.mobile_themes.theme_1.auth.addresses.create', compact('countries'));
    }

    public function storeAddress(Request $request)
    {

        $country = $request->country;


        $validator = \Validator::make($request->all(), [
            'country' => 'required',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'neighborhood' => 'required|exists:neighborhood,id',
            'address' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        $state = State::findOrFail($request->state);
        $city = City::findOrFail($request->city);
        $neighborhood = Neighborhood::findOrFail($request->neighborhood);
        $stateDelivery = $state->delievery_fee ? $state->delievery_fee : 0;
        $cityDelivery = $city->delivery_fee ? $city->delivery_fee : 0;
        $neighborhoodDelivery = $neighborhood->deliery_fee ? $neighborhood->deliery_fee : 0;
        $delivery_fee = $stateDelivery + $cityDelivery + $neighborhoodDelivery;
        $address = UserAddress::create([
            'country' => $country,
            'state' => app()->getLocale() == "ar" ? $state->ar_name : $state->name,
            'city' => app()->getLocale() == "ar" ? $city->ar_name : $city->name,
            'neighborhood' => app()->getLocale() == "ar" ? $neighborhood->ar_name : $neighborhood->name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'delivery_fee' => $delivery_fee,
            'user_id' => auth()->id(),
        ]);

        return response()->json(
            [
                'message' => 'added',
            ],
            200
        );


    }

    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('frontend.themes.mobile_themes.theme_1.auth.orders.index', compact('orders'));

    }

}
