<?php

namespace App\Http\Controllers\dashboard\systems\SystemFive;

use App\Model\dashboard\systems\SystemFive\CompanyDomain;
use App\Model\dashboard\systems\SystemTwo\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyDomainController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $companydomains = CompanyDomain::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemFive.companydomains.index', compact('companydomains'));
    }

    public function edit($id)
    {
        $employees = Staff::orderBy('id', 'asc')->get();
        $companydomain = CompanyDomain::findOrFail($id);
        return view('dashboard.Systems.SystemFive.companydomains.edit', compact('companydomain', 'employees'));
    }

    public function detail($id)
    {
        $companydomain = CompanyDomain::findOrFail($id);
        return view('dashboard.Systems.SystemFive.companydomains.detail', compact('companydomain'));
    }

    public function create()
    {
        $employees = Staff::orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemFive.companydomains.create', compact('employees'));
    }

    public function add_companydomain_post(Request $request)
    {

//        echo $request->name;

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'ar_name' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $new = new CompanyDomain();

        $new->name = $request->name;
        $new->ar_name = $request->ar_name;
        $new->person = auth()->user()->name;

        $created = $new->save();

//        $created = DB::table('system5_companydomains')->insert($data);

        if ($created) {
            return redirect()->route('companydomains.index')->with('success', 'CompanyDomain Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_companydomain_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'ar_name' => 'required|string',
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
        ]);

        $created = CompanyDomain::where('id', $request->companydomain_id)->update($data);

        if ($created) {
            return redirect()->route('companydomains.index')->with('success', 'CompanyDomain Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = CompanyDomain::where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system2_companydomains')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system2_companydomains')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_companydomain($id)
    {
        $deleted = DB::table('system5_companydomains')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('companydomains.index')->with('success', 'CompanyDomain Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_companydomain_post(Request $request)
    {
        $deleted = DB::table('system5_companydomains')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
