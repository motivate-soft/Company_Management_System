<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\LetterStatus;
use App\Model\dashboard\systems\SystemTwo\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LetterStatusController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $letterstatuses = LetterStatus::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.letterstatuses.index', compact('letterstatuses'));
    }

    public function edit($id)
    {
        $persons = Staff::orderBy('id', 'asc')->get();
        $letterstatus = LetterStatus::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.letterstatuses.edit', compact('letterstatus', 'persons'));
    }

    public function detail($id)
    {
        $letterstatus = LetterStatus::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.letterstatuses.detail', compact('letterstatus'));
    }

    public function create()
    {
        $persons = Staff::orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemTwo.letterstatuses.create', compact('persons'));
    }

    public function add_letterstatus_post(Request $request)
    {

//        echo $request->name;

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'ar_name' => 'required|string',
                'person' => 'required|string',
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
            'person' => $request->person,
            'state' => $request->state,
        ]);


        $created = DB::table('system2_letterstatuses')->insert($data);

        if ($created) {
            return redirect()->route('letterstatuses.index')->with('success', 'letterstatus Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_letterstatus_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'ar_name' => 'required|string',
                'person' => 'required|string',
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
            'person' => $request->person,
            'state' => $request->state,
        ]);

        $created = DB::table('system2_letterstatuses')->where('id', $request->letterstatus_id)->update($data);

        if ($created) {
            return redirect()->route('letterstatuses.index')->with('success', 'letterstatus Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_letterstatuses')->where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system2_letterstatuses')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system2_letterstatuses')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_letterstatus($id)
    {
        $deleted = DB::table('system2_letterstatuses')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('letterstatuses.index')->with('success', 'letterstatus Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_letterstatus_post(Request $request)
    {
        $deleted = DB::table('system2_letterstatuses')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
