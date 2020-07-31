<?php

namespace App\Http\Controllers\dashboard\coupons;

use App\Model\Coupon;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $coupons = Coupon::orderBy('id', 'desc')->get();
        return view('dashboard.coupons.index', compact('coupons'));
    }

    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('dashboard.coupons.edit', compact('coupon'));
    }

    public function create()
    {
        return view('dashboard.coupons.create');
    }

    public function add_coupon_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'code' => 'required|string|unique:coupons',
                'type' => 'required',
                'coupon_value' => 'required',
                'status' => 'required',
                'start_date_coupon' => 'required',
                'end_date_coupon' => 'required',
                'total_usage' => 'required|numeric',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'code' => $request->code,
            'type' => $request->type,
            'coupon_value' => $request->coupon_value,
            'status' => $request->status,
            'start_time' => $request->start_date_coupon,
            'end_time' => $request->end_date_coupon,
            'total_usage' => $request->total_usage,
        ]);


        $created = DB::table('coupons')->insert($data);
        if ($created) {
            return redirect()->route('coupons.index')->with('success', 'Coupon Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('coupons')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('coupons')->where('id', $request->id)->update(['status' => 1]);
        } else {
            DB::table('coupons')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function update_coupon_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'code' => 'required|string|unique:coupons,code,' . $request->coupon_id . ',id',
                'type' => 'required',
                'coupon_value' => 'required',
                'status' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'total_usage' => 'required|numeric',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'code' => $request->code,
            'type' => $request->type,
            'coupon_value' => $request->coupon_value,
            'status' => $request->status,
            'start_time' => $request->start_date,
            'end_time' => $request->end_date,
            'total_usage' => $request->total_usage,
        ]);


        $created = DB::table('coupons')->where('id', $request->coupon_id)->update($data);
        if ($created) {
            return redirect()->route('coupons.index')->with('success', 'Coupon Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function del_coupon($id)
    {
        $deleted = DB::table('coupons')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('coupons.index')->with('success', 'Coupon Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function add(Request $request)
    {
        dd($request->all());
    }

    public function del_product($id)
    {
        $del_product = DB::table('products')->where('id', $id)->first();
        if (!is_null($del_product)) {
            DB::table('products')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Product Successfully Delete!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }

    public function add_product_view()
    {
        return view('products.add');
    }


    /*
    * Coupon API endpoint
    */
    public function coupon_validate(Request $request)
    {
        $coupon = DB::table('coupons')
            ->where('code', $request->code)
            ->where('status', 1)
            ->whereNull('deleted_at')
            ->first();

        if (!is_null($coupon)) {
            $expiry = \Carbon\Carbon::now();
            if ($coupon->end_time > $expiry) {

                $coupon_details = ([
                    'id' => $coupon->id,
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->coupon_value
                ]);

                return response()->json(['success' => $coupon_details]);
            } else {
                return response()->json(['error' => 'Coupon expired']);
            }

        } else {
            return response()->json(['error' => 'Invalid coupon code']);
        }
    }


}
