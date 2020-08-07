<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\JobType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobTypeController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $jobtypes = JobType::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.jobtypes.index', compact('jobtypes'));
    }

    public function edit($id)
    {
        $jobtype = Jobtype::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.jobtypes.edit', compact('jobtype'));
    }

    public function detail($id)
    {
        $jobtype = jobtype::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.jobtypes.detail', compact('jobtype'));
    }

    public function create()
    {
        return view('dashboard.Systems.SystemTwo.jobtypes.create');
    }

    public function add_jobtype_post(Request $request)
    {

//        echo $request->name;

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'ar_name' => 'required|string',
                'state' => 'required|numeric',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = ([
            'name' => $request->name,
            'ar_name' => $request->ar_name,
            'state' => $request->state,
        ]);
        
        $created = DB::table('system2_jobtypes')->insert($data);

        if ($created) {
            return redirect()->route('jobtypes.index')->with('success', 'Jobtype Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function update_jobtype_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'ar_name' => 'required|string',
                'state' => 'required|numeric',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'name' => $request->name,
            'ar_name' => $request->ar_name,
            'state' => $request->state,
        ]);

        $created = DB::table('system2_jobtypes')->where('id', $request->jobtype_id)->update($data);

        if ($created) {
            return redirect()->route('jobtypes.index')->with('success', 'jobtype Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_jobtypes')->where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system2_jobtypes')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system2_jobtypes')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_jobtype($id)
    {
        $deleted = DB::table('system2_jobtypes')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('jobtypes.index')->with('success', 'jobtype Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_jobtype_post(Request $request)
    {
        $deleted = DB::table('system2_jobtypes')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
