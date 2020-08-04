<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\EntryExit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EntryExitController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
         $entryexits = Entryexit::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.entryexits.index', compact('entryexits'));
    }

    public function edit($id)
    {
        $entryexit = Entryexit::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.entryexits.edit', compact('entryexit'));
    }

    public function detail($id)
    {
        $entryexit = Entryexit::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.entryexits.detail', compact('entryexit'));
    }


    public function create()
    {
        return view('dashboard.Systems.SystemTwo.entryexits.create');
    }

    public function add_entryexit_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'date' => 'required|date',
                'entry_hour' => 'required|numeric',
                'exit_hour' => 'required|numeric',
                'working_time' => 'required|numeric',
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
            'date' => $request->date,
            'entry_hour' => $request->entry_hour,
            'exit_hour' => $request->exit_hour,
            'working_time' => $request->working_time,
        ]);


        $created = DB::table('system2_entryexits')->insert($data);

        if ($created) {
            return redirect()->route('entryexits.index')->with('success', 'entryexit Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_entryexits')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('system2_entryexits')->where('id', $request->id)->update(['status' => 1]);
        } else {
            DB::table('system2_entryexits')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function update_entryexit_post(Request $request)
    {

//        echo $request->working_time;

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'date' => 'required|date',
                'entry_hour' => 'required|numeric',
                'exit_hour' => 'required|numeric',
                'working_time' => 'required|numeric',
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
            'date' => $request->date,
            'entry_hour' => $request->entry_hour,
            'exit_hour' => $request->exit_hour,
            'working_time' => $request->working_time,
        ]);


        $created = DB::table('system2_entryexits')->where('id', $request->entryexit_id)->update($data);

        if ($created) {
            return redirect()->route('entryexits.index')->with('success', 'entryexit Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function del_entryexit($id)
    {
        $deleted = DB::table('system2_entryexits')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('entryexits.index')->with('success', 'entryexit Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function add(Request $request)
    {
        dd($request->all());
    }

}
