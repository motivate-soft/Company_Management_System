<?php

namespace App\Http\Controllers\Systems\SystemOne;

use App\Model\City;
use App\Model\Country;
use App\Model\dashboard\systems\SystemOne\Customer;
use App\Model\dashboard\systems\SystemOne\Purchase;
use App\Model\State;
use App\Model\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $customers['customers'] = Customer::all();
        return view('dashboard.Systems.SystemOne.index', $customers);
    }

    public function create()
    {
        $sortnames = Country::select('sortname')->distinct()->get();
        $countries = Country::orderBy('sortname', 'asc')->get();
        return view('dashboard.Systems.SystemOne.create', compact('sortnames', 'countries'));
    }

    public function store(Request $request){

        $inserted = ([
            'sales_employee'=> $request->salesemployee,
            'nickname' => $request->nickname,
            'customer_name' => $request->name,
            'entry_type' => $request->entrytype,
            'entry_name' => $request->entryname,
            'position' => $request->position,
            'mobile_number' => $request->mobilenumber,
            'landline_number' => $request->landlinenumber,
            'fax' => $request->fax,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'country_id' => $request->country,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'street_id' => $request->street,
            'address' => $request->address,
        ]);
        $data = Customer::create($inserted);
        if ($data) {
            return redirect('dashboard/customers')->with('success', 'Customer Successfully Added!');
        }else{
            return redirect('dashboard/customers')->with('error', 'Something Went Wrong!');
        }
    }

    public function destroy($id){
        $client = Customer::where('id', $id)->first();

        if ($client) {
            $deleted = Customer::where('id',$id)->delete();
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
        $customer = Customer::where('id', $id)->first();
        $sortnames = Country::select('sortname')->distinct()->get();
        $countries = Country::orderBy('sortname', 'asc')->get();
        $cities = City::all();
        $provinces = State::all();
        $streets = Street::all();

        return view('dashboard.Systems.SystemOne.edit', compact('customer', 'sortnames', 'countries', 'provinces', 'cities', 'streets'));
    }

    public function update(Request $request, $id)
    {
        $data = ([
            'id' => $id,
            'sales_employee'=> $request->salesemployee,
            'nickname' => $request->nickname,
            'customer_name' => $request->name,
            'entry_type' => $request->entrytype,
            'entry_name' => $request->entryname,
            'position' => $request->position,
            'mobile_number' => $request->mobilenumber,
            'landline_number' => $request->landlinenumber,
            'fax' => $request->fax,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'country_id' => $request->country,
            'city_id' => $request->city,
            'province_id' => $request->province,
            'street_id' => $request->street,
            'address' => $request->address,
        ]);

        $customer = Customer::where('id', $id)->first();

        $customer -> update($data);

        return redirect('dashboard/customers')->with('success', 'Customer Successfully Updated!');
    }

    public function profile ($id) {
        $purchases = Purchase::where('customer_id', $id)->get();

        return view('dashboard.Systems.SystemOne.profile', compact('purchases'));
    }

    public function purchases () {

        $purchases['purchases'] = Purchase::all();

        return view('dashboard.Systems.SystemOne.purchases', $purchases);
    }

    public function disbursements () {
        $customers['customers'] = Purchase::all();
        return view('dashboard.Systems.SystemOne.disbursements', $customers);
    }

    public function region_post(Request $request)
    {
        switch ($request->area) {
            case "country":
                $results = State::where('country_id', $request->country)->orderBy('id', 'asc')->get();
                break;
            case "province":
                $results = City::where('state_id', $request->province)->orderBy('id', 'asc')->get();
                break;
            case "city":
                $results = Street::where('city_id', $request->city)->orderBy('id', 'asc')->get();
                break;
        }


        return response()->json($results, 200);
    }
}
