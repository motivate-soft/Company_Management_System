<?php

namespace App\Http\Controllers\Systems\SystemFour;

use App\Model\dashboard\systems\SystemFour\Quotation;
use App\Model\dashboard\systems\SystemOne\Customer;
use App\Model\dashboard\systems\SystemTwo\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mpdf\Tag\Q;
use function Sodium\compare;

class QuotationController extends Controller
{

    public function completed()
    {
        $quotations = Quotation::where('status', 'Completed')->orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemFour.completed', compact('quotations'));
    }


    public function pending()
    {
        $quotations = Quotation::where('status', 'Pending')->orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemFour.pending', compact('quotations'));
    }

    public function rejected()
    {
        $quotations = Quotation::where('status', 'Rejected')->orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemFour.rejected', compact('quotations'));
    }


    public function understudying()
    {
        $quotations = Quotation::where('status', 'UnderStudying')->orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemFour.understudying', compact('quotations'));
    }

    public function create()
    {

        $customers = Customer::all();
        $employees = Staff::all();
        return view('dashboard.Systems.SystemFour.create', compact('customers', 'employees'));
    }

    public function store(Request $request){

        $inserted = ([
            'employee_id'=> $request->employee_id,
            'customer_id' => $request->customer_id,
            'project_name' => $request->project_name,
            'discount_rate' => $request->discount_rate,
            'quantity' => $request->quantity,
        ]);

        if ($request->hasFile('fileUp')) {
            $file = $request->file('fileUp');
            $extension = $file->getClientOriginalExtension();
            if($extension == "jpg" || $extension=="pdf")
            {$filename = uniqid() . '_' . time() . '.' . $extension;
                $file->move('upload/Systems/SystemFour/', $filename);
                $fullname = '/upload/Systems/SystemFour/'.$filename;
            } else{
                return back()->with('error', 'File extension must be .jpg or .pdf');
            }
            $inserted['filename'] = $fullname;

        }


        $data = Quotation::create($inserted);
        if ($data) {
            return back()->with('success', 'Successfully Added!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function edit($id) {
        $quotation = Quotation::where('id', $id)->first();
        $customers = Customer::all();
        $employees = Staff::all();
        return view('dashboard.Systems.SystemFour.edit', compact('customers', 'employees', 'quotation'));

    }

    public function destroy($id){
        $quotation = Quotation::where('id', $id)->first();

        if ($quotation) {
            $deleted = Quotation::where('id',$id)->delete();
            if ($deleted) {
                return back()->with('success', 'Customer Successfully Delete!');
            }else{
                return back()->with('error', 'Something Went Wrong!');
            }
        }
        return back();
    }

    public function destroy_post(Request $request){
        $quotation = Quotation::where('id', $request->id)->first();

        if ($quotation) {
            $deleted = Quotation::where('id',$request->id)->delete();
            if ($deleted) {
                return back()->with('success', 'Customer Successfully Delete!');
            }else{
                return back()->with('error', 'Something Went Wrong!');
            }
        }
        return back();
    }

    public function changeStatus(Request $request){

        Quotation::where('id', $request->id)
            ->update(['status' => $request->input('status')]);
        return back()->with('success', 'Status changed Successfully!');
    }

    public function detail($id){
        $quotation = Quotation::where('id', $id)->first();
        return view('dashboard.Systems.SystemFour.detail', compact('quotation'));
    }
}