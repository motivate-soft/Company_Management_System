<?php

namespace App\Http\Controllers\dashboard\systems\SystemTwo;

use App\Model\dashboard\systems\SystemTwo\Communication;
use App\Model\dashboard\systems\SystemTwo\Staff;
use App\Model\dashboard\systems\SystemTwo\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommunicationController extends Controller
{
    public $successStatus = 200;


    public function index()
    {
         $communications = Communication::orderBy('id', 'desc')->get();
         $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.communications.index', compact('communications', 'transactions'));
    }

    public function edit($id)
    {
        $employees = Staff::orderBy('id', 'asc')->get();
        $communication = Communication::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.communications.edit', compact('communication', 'employees'));
    }

    public function detail($id)
    {
        $communication = Communication::findOrFail($id);
        return view('dashboard.Systems.SystemTwo.communications.detail', compact('communication'));
    }

    public function create()
    {
        $employees = Staff::orderBy('id', 'asc')->get();
        $transactions = Transaction::where('state', 1)->orderBy('id', 'desc')->get();
        return view('dashboard.Systems.SystemTwo.communications.create', compact('transactions', 'employees'));
    }

    public function add_communication_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'transaction_type' => 'required|string',
                'entity_name' => 'required|string',
                'letter_authorized' => 'required|string',
                'employee_responsible' => 'required|string',
                'number' => 'required|numeric|min:0',
                'date_letter' => 'required|date',
                'status_letter' => 'required|numeric',
                'transaction_explanation' => 'required|string',
                'prepayments' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'transaction_type' => $request->transaction_type,
            'entity_name' => $request->entity_name,
            'letter_authorized' => $request->letter_authorized,
            'employee_responsible' => $request->employee_responsible,
            'number' => $request->number,
            'date_letter' => $request->date_letter,
            'status_letter' => $request->status_letter,
            'transaction_explanation' => $request->transaction_explanation,
            'prepayments' => $request->prepayments,
        ]);


        $created = DB::table('system2_communications')->insert($data);

        if ($created) {
            return redirect()->route('communications.index')->with('success', 'communication Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function add_response_post(Request $request) {

//        echo $request->response;

        $validator = Validator::make($request->all(),
            [
                'response' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = ([
            'response' => $request->response,
        ]);

        $created = DB::table('system2_communications')->where('id', $request->communication_id)->update($data);

        if ($created) {
            return redirect()->route('communications.index')->with('success', 'communication Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

    }

    public function update_status_post(Request $request)
    {
        $created = DB::table('system2_communications')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('system2_communications')->where('id', $request->id)->update(['status' => 1]);
        } else {
            DB::table('system2_communications')->where('id', $request->id)->update(['status' => 0]);
        }
    }

    public function update_communication_post(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'transaction_type' => 'required|string',
                'entity_name' => 'required|string',
                'letter_authorized' => 'required|string',
                'employee_responsible' => 'required|string',
                'number' => 'required|numeric|min:0',
                'date_letter' => 'required|date',
                'status_letter' => 'required|numeric',
                'transaction_explanation' => 'required|string',
                'prepayments' => 'required|string',
            ]);

        $attributeNames = array(
            'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'transaction_type' => $request->transaction_type,
            'entity_name' => $request->entity_name,
            'letter_authorized' => $request->letter_authorized,
            'employee_responsible' => $request->employee_responsible,
            'number' => $request->number,
            'date_letter' => $request->date_letter,
            'status_letter' => $request->status_letter,
            'transaction_explanation' => $request->transaction_explanation,
            'prepayments' => $request->prepayments,
        ]);


        $created = DB::table('system2_communications')->where('id', $request->communication_id)->update($data);

        if ($created) {
            return redirect()->route('communications.index')->with('success', 'communication Updated');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


    public function del_communications($id)
    {
        $deleted = DB::table('system2_communications')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('communications.index')->with('success', 'communication Deleted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function del_communications_post(Request $request)
    {
        $deleted = DB::table('system2_communications')->where('id', $request->id)->delete();
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
