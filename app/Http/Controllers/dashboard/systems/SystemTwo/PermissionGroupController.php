<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\Permission;
use App\Model\dashboard\systems\SystemTwo\PermissionGroup;
use App\Model\dashboard\systems\SystemTwo\permissiongroupGroup;
use App\Model\dashboard\systems\SystemTwo\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class permissionGroupController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $permissiongroups = PermissionGroup::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.permissiongroups.index', compact('permissiongroups'));
    }

    public function edit($id)
    {
        $permissions = Permission::where('state', 1)->orderBy('id', 'desc')->get();
        $permissiongroup = PermissionGroup::findOrFail($id);

        $permissions_granted =  $permissiongroup->permissions()->get();

        return view('dashboard.Systems.SystemTwo.permissiongroups.edit', compact('permissiongroup', 'permissions', 'permissions_granted'));
    }

    public function detail($id)
    {
        $permissions = Permission::where('state', 1)->orderBy('id', 'desc')->get();
        $permissiongroup = PermissionGroup::findOrFail($id);

        $permissions_granted =  $permissiongroup->permissions()->get();

        return view('dashboard.Systems.SystemTwo.permissiongroups.detail', compact('permissiongroup', 'permissions', 'permissions_granted'));
    }

    public function create()
    {
        $permissions = Permission::where('state', 1)->orderBy('id', 'desc')->get();

        return view('dashboard.Systems.SystemTwo.permissiongroups.create', compact('permissions'));
    }

    public function add_permissiongroup_post(Request $request)
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

        $new = new PermissionGroup();

        $new->name = $request->name;
        $new->ar_name = $request->ar_name;
        $new->state = $request->state;

        $created = $new->save();

        $permissions = Permission::where('state', 1)->orderBy('id', 'desc')->get();

        $permissiongroup = PermissionGroup::where('id', $new->id)->first();


        $index = [];

        for($x = 0 ; $x < count($permissions) ; $x ++) {


            $permissionid = $permissions[$x]->id;

            if($request->$permissionid) {
                array_push($index, $permissions[$x]->id);
            }

        }

        $permissiongroup->permissions()->detach();

        $permissiongroup->permissions()->attach(Permission::find($index));


//        $created = DB::table('system2_permissiongroups')->insert($data);

        if ($created) {
            return redirect()->route('permissiongroups.index')->with('success', 'permissiongroup Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_permissiongroup_post(Request $request)
    {

        $permissions = Permission::where('state', 1)->orderBy('id', 'desc')->get();

        $permissiongroup = PermissionGroup::where('id', $request->permissiongroup_id)->first();


        $index = [];

        for($x = 0 ; $x < count($permissions) ; $x ++) {


            $permissionid = $permissions[$x]->id;

            if($request->$permissionid) {
                array_push($index, $permissions[$x]->id);
            }

        }

        $permissiongroup->permissions()->detach();

        $permissiongroup->permissions()->attach(Permission::find($index));



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

        $created = PermissionGroup::where('id', $request->permissiongroup_id)->update($data);

        if ($created) {
            return redirect()->route('permissiongroups.index')->with('success', 'permissiongroup Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = PermissionGroup::where('id', $request->id)->first();
        if ($created->state == 0) {
            PermissionGroup::where('id', $request->id)->update(['state' => 1]);
        } else {
            PermissionGroup::where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_permissiongroup($id)
    {
        $deleted = PermissionGroup::where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('permissiongroups.index')->with('success', 'permissiongroup Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_permissiongroup_post(Request $request)
    {
        $deleted = PermissionGroup::where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
