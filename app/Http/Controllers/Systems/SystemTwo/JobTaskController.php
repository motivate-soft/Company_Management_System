<?php

namespace App\Http\Controllers\Systems\SystemTwo;

use App\Model\JobTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobTaskController extends Controller
{
    public $successStatus = 200;


    public function index()
    {

        $jobtasks = JobTask::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.jobtasks.index', compact('jobtasks'));
    }

    public function edit($id)
    {
        $jobtask = JobTask::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.jobtasks.edit', compact('jobtask'));
    }

    public function detail($id)
    {
        $jobtask = JobTask::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.jobtasks.detail', compact('jobtask'));
    }

    public function report($id)
    {
//        $jobtask = JobTask::findOrFail($id);

        $table = JobTask::all();
        $filename = "jobtasks.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('employee', 'job_name', 'job_type', 'job_task_date'));

        foreach($table as $row) {
            fputcsv($handle, array($row['employee'], $row['job_name'], $row['job_type'], $row['job_task_date']));
        }

        fclose($handle);

        return response()->download(public_path('jobtasks.csv'));

    }

    public function create()
    {
        return view('dashboard.Systems.SystemTwo.jobtasks.create');
    }

    public function add_jobtask_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'employee' => 'required|string',
                'job_name' => 'required',
                'job_type' => 'required',
                'job_task_date' => 'required|date',
                'job_number_days' => 'required|numeric',
                'status' => 'required|string',
                'job_note' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'employee' => $request->employee,
            'job_name' => $request->job_name,
            'job_type' => $request->job_type,
            'job_task_date' => $request->job_task_date,
            'job_number_days' => $request->job_number_days,
            'status' => $request->status,
            'job_note' => $request->job_note,
        ]);


        $created = DB::table('system2_jobtasks')->insert($data);

        if ($created) {
            return redirect()->route('jobtasks.index')->with('success', 'Jobtask Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_jobtasks')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('system2_jobtasks')->where('id', $request->id)->update(['status' => 1]);
        } else {
            DB::table('system2_jobtasks')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function update_jobtask_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
//                'employee' => 'required|string,' . $request->jobtask_id . ',id',
                'employee' => 'required|string',
                'job_name' => 'required',
                'job_type' => 'required',
                'job_task_date' => 'required|date',
                'job_number_days' => 'required|numeric',
                'status' => 'required|string',
                'job_note' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'employee' => $request->employee,
            'job_name' => $request->job_name,
            'job_type' => $request->job_type,
            'job_task_date' => $request->job_task_date,
            'job_number_days' => $request->job_number_days,
            'status' => $request->status,
            'job_note' => $request->job_note,
        ]);


        $created = DB::table('system2_jobtasks')->where('id', $request->jobtask_id)->update($data);

        if ($created) {
            return redirect()->route('jobtasks.index')->with('success', 'Jobtask Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function del_jobtask($id)
    {
        $deleted = DB::table('system2_jobtasks')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('jobtasks.index')->with('success', 'Jobtask Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function add(Request $request)
    {
        dd($request->all());
    }

}
