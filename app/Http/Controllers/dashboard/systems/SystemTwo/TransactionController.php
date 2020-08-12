<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\Staff;
use App\Model\dashboard\systems\SystemTwo\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.transactions.index', compact('transactions'));
    }

    public function edit($id)
    {
        $persons = Staff::orderBy('id', 'asc')->get();
        $transaction = Transaction::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.transactions.edit', compact('transaction', 'persons'));
    }

    public function detail($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.transactions.detail', compact('transaction'));
    }

    public function create()
    {
        $persons = Staff::orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemTwo.transactions.create', compact('persons'));
    }

    public function add_transaction_post(Request $request)
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


        $created = DB::table('system2_transactions')->insert($data);

        if ($created) {
            return redirect()->route('transactions.index')->with('success', 'Transaction Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_transaction_post(Request $request)
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

        $created = DB::table('system2_transactions')->where('id', $request->transaction_id)->update($data);

        if ($created) {
            return redirect()->route('transactions.index')->with('success', 'Transaction Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_transactions')->where('id', $request->id)->first();
        if ($created->state == 0) {
            DB::table('system2_transactions')->where('id', $request->id)->update(['state' => 1]);
        } else {
            DB::table('system2_transactions')->where('id', $request->id)->update(['state' => 0]);
        }
    }


    public function del_transaction($id)
    {
        $deleted = DB::table('system2_transactions')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('transactions.index')->with('success', 'Transaction Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_transaction_post(Request $request)
    {
        $deleted = DB::table('system2_transactions')->where('id', $request->id)->delete();
        if ($deleted) {
            return 1;
        } else {
            return 0;
        }
    }
}
