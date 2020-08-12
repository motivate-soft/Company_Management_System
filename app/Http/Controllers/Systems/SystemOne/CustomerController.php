<?php

namespace App\Http\Controllers\Systems\SystemOne;

use App\Model\City;
use App\Model\Country;
use App\Model\dashboard\systems\SystemOne\Customer;
use App\Model\dashboard\systems\SystemOne\Purchase;
use App\Model\dashboard\systems\SystemTwo\Staff;
use App\Model\State;
use App\Model\Street;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $customers['customers'] = Customer::all();
        return view('dashboard.Systems.SystemOne.index', $customers);
    }

    public function create()
    {
        $sortnames = Country::select('sortname')->distinct()->get();
        $countries = Country::orderBy('sortname', 'asc')->get();
        $employees = Staff::all();
        return view('dashboard.Systems.SystemOne.create', compact('sortnames', 'countries', 'employees'));
    }

    public function store(Request $request){
        $customers = Customer::all();
        foreach ($customers as $customer){
            if($customer->email == $request->email){
                return redirect('dashboard/customers')->with('error', 'Duplicated Email!');
            }
        }
        $inserted = ([
            'employee_id'=> $request->employee_id,
            'customer_id' => $request->nickname,
            'customer_name' => $request->name,
            'membership' => 'C-'.date('Ymd').$request->nickname,
            'entry_type' => $request->entrytype,
            'entry_name' => $request->entryname,
            'position' => $request->position,
            'mobile_number' => $request->mobilenumber,
            'landline_number' => $request->landlinenumber,
            'fax' => $request->fax,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'country_id' => $request->country,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'street_id' => $request->street,
            'address' => $request->address,
        ]);
        $data = Customer::create($inserted);
        if ($data) {
            return redirect('dashboard/customers')->with('success', 'Customer Successfully Added!');
        }else{
            return redirect('dashboard/customers')->with('error', 'Something Went Wrong!');
        }
    }

    public function destroy($id){
        $client = Customer::where('id', $id)->first();

        if ($client) {
            $deleted = Customer::where('id',$id)->delete();
            if ($deleted) {
                return redirect('dashboard/customers')->with('success', 'Customer Successfully Delete!');
            }else{
                return redirect('dashboard/customers')->with('error', 'Something Went Wrong!');
            }
        }
        return redirect('dashboard/customers');
    }

    public function destroy_post(Request $request){
        $client = Customer::where('id', $request->id)->first();

        if ($client) {
            $deleted = Customer::where('id',$request->id)->delete();
            if ($deleted) {
                return redirect('dashboard/customers')->with('success', 'Customer Successfully Delete!');
            }else{
                return redirect('dashboard/customers')->with('error', 'Something Went Wrong!');
            }
        }
        return redirect('dashboard/customers');
    }


    /**
     * single customer detail
     */
    public function edit ($id) {
        $employees = Staff::all();
        $customer = Customer::where('id', $id)->first();
        $sortnames = Country::select('sortname')->distinct()->get();
        $countries = Country::orderBy('sortname', 'asc')->get();
        $cities = City::all();
        $provinces = State::all();
        $streets = Street::all();

        return view('dashboard.Systems.SystemOne.edit', compact('employees','customer', 'sortnames', 'countries', 'provinces', 'cities', 'streets'));
    }

    public function update(Request $request, $id)
    {
        $customers = Customer::all();
        foreach ($customers as $customer){
            if($customer->email == $request->email){
                if($customer->id != $id)
                return redirect('dashboard/customers')->with('error', 'Duplicated Email!');
            }
        }
        $data = ([
            'id' => $id,
            'sales_employee'=> $request->employee_id,
            'nickname' => $request->nickname,
            'customer_name' => $request->name,
            'entry_type' => $request->entrytype,
            'entry_name' => $request->entryname,
            'position' => $request->position,
            'mobile_number' => $request->mobilenumber,
            'landline_number' => $request->landlinenumber,
            'fax' => $request->fax,
            'email' => $request->email,
            'zipcode' => $request->zipcode,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'province_id' => $request->province_id,
            'street_id' => $request->street_id,
            'address' => $request->address,
        ]);

        $customer = Customer::where('id', $id)->first();

        $customer -> update($data);

        return redirect('dashboard/customers')->with('success', 'Customer Successfully Updated!');
    }

    public function profile ($id) {
        $purchases = Purchase::where('customer_id', $id)->get();

        return view('dashboard.Systems.SystemOne.profile', compact('purchases'));
    }

    public function purchases () {

        $purchases['purchases'] = DB::select("SELECT
                                            quotation_id,
                                            description_en,
                                            amount,
                                            customer_name,
                                            table1.created_at,
                                            description
                                        FROM
                                            (
                                                SELECT
                                                    quotation_id,
                                                    description_en,
                                                    amount,
                                                    customer_id,
                                                    created_at,
                                                    description
                                                FROM
                                                    (
                                                        SELECT
                                                            quotation_id,
                                                            product_id,
                                                            description_en,
                                                            SUM(amount) AS amount
                                                        FROM
                                                            (
                                                                SELECT
                                                                    quotation_id,
                                                                    product_id,
                                                                    description_en,
                                                                    sale_price * quantity AS amount
                                                                FROM
                                                                    product_quotation
                                                                LEFT JOIN products ON product_quotation.product_id = products.id
                                                            ) AS table2
                                                        GROUP BY
                                                            table2.quotation_id
                                                    ) AS table0
                                                LEFT JOIN system4_quotations ON table0.quotation_id = system4_quotations.id
                                              
                                                where status = 'Completed'
                                            ) AS table1
                                        LEFT JOIN system1_customers ON table1.customer_id = system1_customers.id");
                    return view('dashboard.Systems.SystemOne.purchases', $purchases);
    }

    public function disbursements () {
        $customers['customers'] = DB::select("SELECT
	quotation_id,
	description_en,
	amount,
	customer_name,
	address,
	email,
	mobile_number
FROM
	(
		SELECT
			quotation_id,
			description_en,
			SUM(amount) AS amount,
			customer_id,
			created_at,
			description
		FROM
			(
				SELECT
					*
				FROM
					(
						SELECT
							quotation_id,
							product_id,
							description_en,
							SUM(amount) AS amount
						FROM
							(
								SELECT
									quotation_id,
									product_id,
									description_en,
									sale_price * quantity AS amount
								FROM
									product_quotation
								LEFT JOIN products ON product_quotation.product_id = products.id
							) AS table2
						GROUP BY
							table2.quotation_id
					) AS table0
				LEFT JOIN system4_quotations ON table0.quotation_id = system4_quotations.id
				WHERE
					STATUS = 'Completed'
			) AS table9
		GROUP BY
			customer_id
	) AS table1
LEFT JOIN system1_customers ON table1.customer_id = system1_customers.id");
        return view('dashboard.Systems.SystemOne.disbursements', $customers);
    }

    public function region_post(Request $request)
    {
        switch ($request->area) {
            case "country":
                $results = State::where('country_id', $request->country)->orderBy('id', 'asc')->get();
                break;
            case "province":
                $results = City::where('state_id', $request->province)->orderBy('id', 'asc')->get();
                break;
            case "city":
                $results = Street::where('city_id', $request->city)->orderBy('id', 'asc')->get();
                break;
        }
        return response()->json($results, 200);
    }
}
