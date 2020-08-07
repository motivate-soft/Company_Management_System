<?php

namespace App\Http\Controllers\dashboard\systems\SystemFive;

use App\Model\dashboard\systems\SystemFive\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
        $offers = Offer::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemFive.offers.index', compact('offers'));
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('dashboard.Systems.SystemFive.offers.edit', compact('offer'));
    }

    public function detail($id)
    {
        $offer = Offer::findOrFail($id);
        return view('dashboard.Systems.SystemFive.offers.detail', compact('offer'));
    }

    public function create()
    {
        return view('dashboard.Systems.SystemFive.offers.create');
    }

    public function add_offer_post(Request $request)
    {

//        echo $request->name;

        $validator = Validator::make($request->all(),
            [
                'company_name' => 'required|string',
                'domain' => 'required|string',
                'offer_title' => 'required|string',
                'order_detail' => 'required|string',
                'state' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = ([
            'company_name' => $request->company_name,
            'domain' => $request->domain,
            'offer_title' => $request->offer_title,
            'order_detail' => $request->order_detail,
            'state' => $request->state,
        ]);

        $created = DB::table('system5_offers')->insert($data);

        if ($created) {
            return redirect()->route('offers.index')->with('success', 'Offer Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_offer_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'company_name' => 'required|string',
                'domain' => 'required|string',
                'offer_title' => 'required|string',
                'order_detail' => 'required|string',
                'state' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'company_name' => $request->company_name,
            'domain' => $request->domain,
            'offer_title' => $request->offer_title,
            'order_detail' => $request->order_detail,
            'state' => $request->state,
        ]);

        $created = DB::table('system5_offers')->where('id', $request->offer_id)->update($data);

        if ($created) {
            return redirect()->route('offers.index')->with('success', 'offer Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system5_offers')->where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system5_offers')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system5_offers')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_offer($id)
    {
        $deleted = DB::table('system5_offers')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('offers.index')->with('success', 'offer Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_offer_post(Request $request)
    {
        $deleted = DB::table('system5_offers')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
    public function filter_post(Request $request)
    {
        if($request->value == "All") {

            $data = Offer::orderBy('id', 'asc')->get();

        }else {

            $data = Offer::where('state', $request->value)->get();

        }
        return $data;
    }
}
