<?php

namespace App\Http\Controllers\dashboard\systems\SystemFive;

use App\Model\dashboard\systems\systemFive\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $fields = Field::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemFive.fields.index', compact('fields'));
    }

    public function edit($id)
    {
        $field = Field::findOrFail($id);
        return view('dashboard.Systems.SystemFive.fields.edit', compact('field'));
    }

    public function detail($id)
    {
        $field = Field::findOrFail($id);
        return view('dashboard.Systems.SystemFive.fields.detail', compact('field'));
    }

    public function create()
    {
        return view('dashboard.Systems.SystemFive.fields.create');
    }

    public function add_field_post(Request $request)
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

        $created = DB::table('system5_fields')->insert($data);

        if ($created) {
            return redirect()->route('fields.index')->with('success', 'field Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function update_field_post(Request $request)
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

        $created = DB::table('system5_fields')->where('id', $request->field_id)->update($data);

        if ($created) {
            return redirect()->route('fields.index')->with('success', 'field Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system5_fields')->where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system5_fields')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system5_fields')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_field($id)
    {
        $deleted = DB::table('system5_fields')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('fields.index')->with('success', 'field Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_field_post(Request $request)
    {
        $deleted = DB::table('system5_fields')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
