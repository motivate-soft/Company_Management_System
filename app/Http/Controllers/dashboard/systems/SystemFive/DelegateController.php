<?php

namespace App\Http\Controllers\dashboard\systems\SystemFive;

use App\Model\dashboard\systems\SystemFive\Delegate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DelegateController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $delegates = Delegate::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemFive.delegates.index', compact('delegates'));
    }

    public function edit($id)
    {
        $delegate = Delegate::findOrFail($id);
        return view('dashboard.Systems.SystemFive.delegates.edit', compact('delegate'));
    }

    public function detail($id)
    {
        $delegate = Delegate::findOrFail($id);
        return view('dashboard.Systems.SystemFive.delegates.detail', compact('delegate'));
    }

    public function create()
    {
        return view('dashboard.Systems.SystemFive.delegates.create');
    }

    public function add_delegate_post(Request $request)
    {

//        echo $request->name;

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'position' => 'required|string',
                'mobile' => 'required|numeric',
                'telephone' => 'required|numeric',
                'email' => 'required|email',
                'notes' => 'required|string',
                'cardimage' => 'required|string',
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
            'position' => $request->position,
            'mobile' => $request->mobile,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'notes' => $request->notes,
            'cardimage' => $request->cardimage,
        ]);

        if($request->delegate_id) {

//            $new = array_merge(['id' => $request->delegate_id], $data);

            $created = DB::table('system5_delegates')->where('id', $request->delegate_id)->update($data);


        } else {
            $created = DB::table('system5_delegates')->insert($data);

        }


        print_r($data) ;


        if ($created) {
            return redirect()->route('companies.detail', $request->company_id)->with('success', 'Delegate Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_delegate_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'position' => 'required|string',
                'mobile' => 'required|numeric',
                'telephone' => 'required|numeric',
                'email' => 'required|email',
                'notes' => 'required|string',
                'cardimage' => 'required|string',
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
            'position' => $request->position,
            'mobile' => $request->mobile,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'notes' => $request->notes,
            'cardimage' => $request->cardimage,
        ]);

        $created = DB::table('system5_delegates')->where('id', $request->delegate_id)->update($data);

        if ($created) {
            return redirect()->route('companies.detail')->with('success', 'Delegate Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system5_delegates')->where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system5_delegates')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system5_delegates')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_delegate($id)
    {
        $deleted = DB::table('system5_delegates')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('delegates.index')->with('success', 'delegate Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_delegate_post(Request $request)
    {
        $deleted = DB::table('system5_delegates')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
    public function filter_post(Request $request)
    {
        if($request->value == "All") {

            $data = delegate::orderBy('id', 'asc')->get();

        }else {

            $data = delegate::where('state', $request->value)->get();

        }
        return $data;
    }
}
