<?php

namespace App\Http\Controllers\Systems\SystemTwo;

use App\Model\Staff;
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
        return view('dashboard.Systems.SystemTwo.staffs.index', compact('staffs'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.staffs.edit', compact('staff'));
    }

    public function detail($id)
    {
        $staff = Staff::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.staffs.detail', compact('staff'));
    }

    public function create()
    {
        return view('dashboard.Systems.SystemTwo.staffs.create');
    }

    public function add_staff_post(Request $request)
    {

//        echo $request->selection_powers;

        $validator = Validator::make($request->all(),
            [
                'firstname' => 'required|string',
                'secondname' => 'required|string',
                'lastname' => 'required|string',
                'mobile_number' => 'required|string',
                'monthly_salary' => 'required|string',
                'working_hours' => 'required|numeric',
                'email' => 'required|email',
                'address' => 'required|string',
                'country' => 'required|string',
                'province' => 'required|string',
                'city' => 'required|string',
                'selection_powers' => 'required|string',
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
            'selection_powers' => $request->selection_powers,
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
                'mobile_number' => 'required|string',
                'monthly_salary' => 'required|string',
                'working_hours' => 'required|numeric',
                'email' => 'required|email',
                'address' => 'required|string',
                'country' => 'required|string',
                'province' => 'required|string',
                'city' => 'required|string',
                'selection_powers' => 'required|string',
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
            'selection_powers' => $request->selection_powers,
        ]);


        $created = DB::table('system2_staffs')->where('id', $request->staff_id)->update($data);

        if ($created) {
            return redirect()->route('staffs.index')->with('success', 'staff Updated');
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

    public function add(Request $request)
    {
        dd($request->all());
    }

}
