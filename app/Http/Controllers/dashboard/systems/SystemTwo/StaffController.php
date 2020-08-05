<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\City;
use App\Model\Country;
use App\Model\dashboard\systems\SystemTwo\Staff;
use App\Model\Neighborhood;
use App\Model\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public $successStatus = 200;


    public function index()
    {

        $staffs = Staff::orderBy('id', 'desc')->get();

        $countries = Country::orderBy('id', 'asc')->get();
        $provinces = State::orderBy('id', 'asc')->get();
        $cities = City::orderBy('id', 'asc')->get();
        $neighborhoods = Neighborhood::orderBy('id', 'asc')->get();

        return view('dashboard.Systems.SystemTwo.staffs.index', compact('staffs', 'countries', 'provinces', 'cities', 'neighborhoods'));
    }

    public function edit($id)
    {

        $staff = Staff::findOrFail($id);

        $sortnames = Country::orderBy('id', 'asc')->distinct()->get('sortname');
        $countries = Country::orderBy('id', 'asc')->get();
        $provinces = State::where('country_id', $staff->country)->get();
        $cities = City::where('state_id', $staff->province)->get();
        $neighborhoods = Neighborhood::where('city_id', $staff->city)->get();

        return view('dashboard.Systems.SystemTwo.staffs.edit', compact('staff', 'sortnames', 'countries', 'provinces', 'cities', 'neighborhoods'));
    }

    public function detail($id)
    {
        $staff = Staff::findOrFail($id);

        $countries = Country::orderBy('id', 'asc')->get();
        $provinces = State::orderBy('id', 'asc')->get();
        $cities = City::orderBy('id', 'asc')->get();
        $neighborhoods = neighborhood::orderBy('id', 'asc')->get();

        return view('dashboard.Systems.SystemTwo.staffs.detail', compact('staff', 'countries', 'provinces', 'cities', 'neighborhoods'));
    }

    public function create()
    {
        $sortnames = Country::orderBy('id', 'asc')->distinct()->get('sortname');
        $countries = Country::orderBy('id', 'asc')->get();

        return view('dashboard.Systems.SystemTwo.staffs.create', compact('sortnames', 'countries'));
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
                $results = neighborhood::where('city_id', $request->city)->orderBy('id', 'asc')->get();
                break;
        }


        return response()->json($results, 200);
    }

    public function add_staff_post(Request $request)
    {

//        echo $request->selection_powers;

        $validator = Validator::make($request->all(),
            [
                'firstname' => 'required|string',
                'secondname' => 'required|string',
                'lastname' => 'required|string',
                'mobile_number' => 'required|numeric|min:0',
                'monthly_salary' => 'required|string',
                'working_hours' => 'required|numeric|min:0',
                'email' => 'required|email',
                'address' => 'required|string',
                'country' => 'required|string',
                'province' => 'required|string',
                'city' => 'required|string',
                'neighborhood' => 'required|string',
                'permission' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'lastname' => $request->lastname,
            'mobile_number' => $request->mobile_number,
            'monthly_salary' => $request->monthly_salary,
            'working_hours' => $request->working_hours,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'permission' => $request->permission,
        ]);


        $created = DB::table('system2_staffs')->insert($data);

        if ($created) {
            return redirect()->route('staffs.index')->with('success', 'Staff Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_staffs')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('system2_staffs')->where('id', $request->id)->update(['status' => 1]);
        } else {
            DB::table('system2_staffs')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function update_staff_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
//                'employee' => 'required|string,' . $request->staff_id . ',id',
                'firstname' => 'required|string',
                'secondname' => 'required|string',
                'lastname' => 'required|string',
                'mobile_number' => 'required|numeric|min:0',
                'monthly_salary' => 'required|string',
                'working_hours' => 'required|numeric|min:0',
                'email' => 'required|email',
                'address' => 'required|string',
                'country' => 'required|string',
                'province' => 'required|string',
                'city' => 'required|string',
                'neighborhood' => 'required|string',
                'permission' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'firstname' => $request->firstname,
            'secondname' => $request->secondname,
            'lastname' => $request->lastname,
            'mobile_number' => $request->mobile_number,
            'monthly_salary' => $request->monthly_salary,
            'working_hours' => $request->working_hours,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'neighborhood' => $request->neighborhood,
            'permission' => $request->permission,
        ]);


        $created = DB::table('system2_staffs')->where('id', $request->staff_id)->update($data);

        if ($created) {
            return redirect()->route('staffs.index')->with('success', 'Staff Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function del_staff($id)
    {
        $deleted = DB::table('system2_staffs')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('staffs.index')->with('success', 'staff Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_staff_post(Request $request)
    {

        $deleted = DB::table('system2_staffs')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add(Request $request)
    {
        dd($request->all());
    }

}
