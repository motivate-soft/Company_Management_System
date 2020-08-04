<?php

namespace App\Http\Controllers\frontend;

use App\Model\Bank;
use App\Model\City;
use App\Model\Country;
use App\Model\Neighborhood;
use App\Model\State;
use App\Model\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['CheckAuth','CheckPhoneVerified']);
    }

    public function address()
    {
        if (session('cart')) {
            $addresses = UserAddress::where('user_id', auth()->id())->get();
            $countries = Country::all();
            return view('frontend.themes.mobile_themes.theme_1.checkout.address', compact('addresses',
                'countries'));
        } else {
            return redirect()->home();
        }
    }

    public function checkoutPayment()
    {
        $tax = DB::table('config_settings')->where('_key', 'tax')->first();
        $banks = Bank::all();
        if (session('checkout')) {
            return view('frontend.themes.mobile_themes.theme_1.checkout.payment', compact('banks',
                'tax'));
        } else {
            return redirect()->home();
        }
    }

    public function confirmation()
    {

        $tax = DB::table('config_settings')->where('_key', 'tax')->first();
        if (session('payment')) {
            return view('frontend.themes.mobile_themes.theme_1.checkout.confirmation', compact('tax'));
        } else {
            return redirect()->home();
        }
    }

    public function getBankInfo(Request $request)
    {
        $bank = Bank::findOrFail($request->id);

        return response()->json(
            [
                'bank' => $bank,
            ],
            200
        );

    }

    public function states(Request $request)
    {
        $country_id = $request->id;
        $states = State::where('country_id', $country_id)->get();

        if (count($states) > 0) {

            return response()->json(
                [
                    'states' => $states,
                ],
                200
            );
        } else {
            return response()->json(['errors' => "error"]);
        }
    }

    public function cities(Request $request)
    {
        $id = $request->id;
        $cities = City::where('state_id', $id)->get();

        if (count($cities) > 0) {

            return response()->json(
                [
                    'cities' => $cities,
                ],
                200
            );
        } else {
            return response()->json(['errors' => "error"]);
        }
    }

    public function neighborhoods(Request $request)
    {
        $id = $request->id;
        $neighborhoods = Neighborhood::where('city_id', $id)->get();

        if (count($neighborhoods) > 0) {

            return response()->json(
                [
                    'neighborhoods' => $neighborhoods,
                ],
                200
            );
        } else {
            return response()->json(['errors' => "error"]);
        }
    }

    public function checkoutSelectAddress(Request $request)
    {
        $address_id = $request->address_id;
        $country = $request->country;


        if ($request->type == "choose") {
            $validator = \Validator::make($request->all(), [
                'address_id' => 'required|exists:user_addresses,id',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()]);
            }
            $address = UserAddress::findOrFail($address_id);
            $checkout = [
                "address" => $address,
            ];
            session()->put('checkout', $checkout);
        } elseif ($request->type == "add_address") {
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
            $checkout = session()->get('checkout');
            if (!$checkout) {
                $checkout = [
                    "address" => $address,
                ];
                session()->put('checkout', $checkout);
            }
            return response()->json(
                [
                    'message' => 'added',
                ],
                200
            );


        }


    }

    public function checkoutSelectPayment(Request $request)
    {
        $payment = $request->payment;
        $bank = $request->bank;
        $validator = \Validator::make($request->all(), [
            'bank' => 'nullable|' . Rule:: requiredIf($payment == "bank") . '|exists:bank,id',
            'payment' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        $bank_details = Bank::where('id', $bank)->first();
        if ($bank_details){
            $bank = $bank_details;
        }
        $payment = [
            "payment_method" => $request->payment,
            "bank" => $bank,
        ];
        session()->put('payment', $payment);

        return response()->json(
            [
                'message' => 'added',
            ],
            200
        );

    }
}
