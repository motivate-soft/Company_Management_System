<?php

namespace App\Http\Controllers\dashboard\systems\SystemFive;

use App\Model\Country;
use App\Model\dashboard\systems\SystemFive\AttachFile;
use App\Model\dashboard\systems\SystemFive\Company;
use App\Model\dashboard\systems\SystemFive\Delegate;
use App\Model\dashboard\systems\systemFive\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemFive.companies.index', compact('companies'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('dashboard.Systems.SystemFive.companies.edit', compact('company'));
    }

    public function detail($id)
    {
        $delegates = Delegate::orderBy('id', 'asc')->get();
        $company = Company::findOrFail($id);
        return view('dashboard.Systems.SystemFive.companies.detail', compact('company', 'delegates'));
    }


    public function create()
    {
        $fields = Field::all();
        $sortnames = Country::distinct()->get('sortname');
        $countries = Country::all();
        return view('dashboard.Systems.SystemFive.companies.create', compact('fields', 'sortnames', 'countries'));
    }

    public function add_company_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'field' => 'required|string',
                'country' => 'required|string',
                'region' => 'required|string',
                'city' => 'required|string',
                'neighborhood' => 'required|string',
                'address' => 'required|string',
                'mobile' => 'required|numeric',
                'email' => 'required|email',
                'telephone' => 'required|numeric',
                'bankname' => 'required|string',
                'bankaccount' => 'required|string',
                'accountname' => 'required|string',
                'accountnumber' => 'required|string',
                'accountiban' => 'required|string',
                'swiftcode' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $new = new Company();

        $new->name = $request->name;
        $new->field = $request->field;
        $new->country = $request->country;
        $new->region = $request->region;
        $new->city = $request->city;
        $new->neighborhood = $request->neighborhood;
        $new->address = $request->address;
        $new->mobile = $request->mobile;
        $new->email = $request->email;
        $new->telephone = $request->telephone;
        $new->bankname = $request->telephone;
        $new->bankaccount = $request->telephone;
        $new->banknumber = $request->telephone;
        $new->accountiban = $request->telephone;
        $new->swiftcode = $request->telephone;

        $created = $new->save();

//        $created = DB::table('system5_companies')->insert($data);

        if ($created) {
            return redirect()->route('companies.index')->with('success', 'company Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system5_companies')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('system5_companies')->where('id', $request->id)->update(['status' => 1]);
        } else {
            DB::table('system5_companies')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function update_company_post(Request $request)
    {

//        echo $request->working_time;

        $request_modified =

            [
                'name' => $request->name,
                'field' => $request->field,
                'country' => $request->country,
                'region' => $request->region,
                'city' => $request->city,
                'neighborhood' => $request->neighborhood,
                'mobile' => $request->mobile,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'address' => $request->address,
                'bankname' => $request->bankaccount,
                'accountname' => $request->bankaccount,
                'accountnumber' => $request->bankaccount,
                'accountiban' => $request->bankaccount,
                'a' => $request->bankaccount,
                'bankaccount' => $request->bankaccount,
                'cardimage' => $request->cardimage
            ];

        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'field' => 'required|string',
                'country' => 'required|string',
                'region' => 'required|string',
                'city' => 'required|string',
                'neighborhood' => 'required|string',
                'mobile' => 'required|numeric',
                'telephone' => 'required|numeric',
                'email' => 'required|email',
                'address' => 'required|string',
                'bankname' => 'required|string',
                'bankaccount' => 'required|string',
                'banknumber' => 'required|string',
                'accountiban' => 'required|string',
                'swiftcode' => 'required|string',
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
            'field' => $request->field,
            'country' => $request->country,
            'city' => $request->city,
            'mobile' => $request->mobile,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'address' => $request->address,
            'bankaccount' => $request->bankaccount,
            'cardimage' => $request->cardimage,
        ]);

        $attachdata = ([
            'company_id' => $request->company_id,
            'catalogfile' => isset($request->catalogfile) ? $request->catalogfile : null,
            'pricelistfile' => isset($request->pricelistfile) ? $request->pricelistfile : null,
        ]);


        AttachFile::updateOrCreate($attachdata);


        $created = DB::table('system5_companies')->where('id', $request->company_id)->update($data);

        if ($created) {
            return redirect()->route('companies.index')->with('success', 'company Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function del_company($id)
    {
        $deleted = DB::table('system5_companies')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('companies.index')->with('success', 'company Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_company_post(Request $request)
    {
        $deleted = DB::table('system5_companies')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add(Request $request)
    {
        dd($request->all());
    }
}
