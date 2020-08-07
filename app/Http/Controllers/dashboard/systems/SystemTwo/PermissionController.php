<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\Permission;
use App\Model\dashboard\systems\SystemTwo\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.permissions.index', compact('permissions'));
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.permissions.edit', compact('permission'));
    }

    public function detail($id)
    {
        $permission = Permission::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.permissions.detail', compact('permission'));
    }

    public function create()
    {
        $persons = Staff::orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemTwo.permissions.create', compact('persons'));
    }

    public function add_permission_post(Request $request)
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

        $new = new Permission();

        $new->name = $request->name;
        $new->ar_name = $request->ar_name;
        $new->state = $request->state;

        $created = $new->save();


//        $created = DB::table('system2_permissions')->insert($data);

        if ($created) {
            return redirect()->route('permissions.index')->with('success', 'permission Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_permission_post(Request $request)
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

        $created = Permission::where('id', $request->permission_id)->update($data);

        if ($created) {
            return redirect()->route('permissions.index')->with('success', 'permission Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = Permission::where('id', $request->id)->first();
        if ($created->state == 0) {
            Permission::where('id', $request->id)->update(['state' => 1]);
        } else {
            Permission::where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_permission($id)
    {
        $deleted = Permission::where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('permissions.index')->with('success', 'permission Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_permission_post(Request $request)
    {
        $deleted = Permission::where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
