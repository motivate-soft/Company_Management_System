<?php

namespace App\Http\Controllers\Systems\SystemFour;

use App\Model\dashboard\systems\SystemFour\Quotation;
use App\Model\dashboard\systems\SystemOne\Customer;
use App\Model\dashboard\systems\SystemTwo\Staff;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationController extends Controller
{

    public function all()
    {
        $quotations = Quotation::orderBy('id', 'asc')->get();
        return view('dashboard.Systems.SystemFour.all', compact('quotations'));
    }

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
        $products = Product::all();
        $customers = Customer::all();
        $employees = Staff::all();
        return view('dashboard.Systems.SystemFour.create', compact('customers', 'employees', 'products'));
    }

    public function store(Request $request){

        $inserted = ([
            'employee_id'   => $request->employee_id,
            'customer_id'   => $request->customer_id,
            'project_name'  => $request->project_name,
            'discount_rate' => $request->discount_rate,
            'purchase_info' => $request->purchase_info,
        ]);

        $new = new Quotation();

        $new->employee_id = $request->employee_id;
        $new->customer_id = $request->customer_id;
        $new->project_name = $request->project_name;
        $new->discount_rate = $request->discount_rate;

        $new->save();

        $quotation = Quotation::where('id', $new->id)->first();

        $index = [];

        for($x = 0 ; $x < count($request->purchase_info) ; $x ++) {

            $productid = $request->purchase_info[$x]['product'];

//            ['quantity' => $request->purchase_info[$x]['quantity']]

//            $quotation->products()->save($productid, ['quantity' => $request->purchase_info[$x]['quantity']]);

            array_push($index, $productid);

//            $quotation->products()->save($productid);

        }

//        $quotation->products()->save([0 => "1", 1 => "2", 2 => "3"]);
        $quotation->products()->sync([1, 2]);

        return $quotation;



//        $quotation->products()->save(Product::find($index));



//        $quotation->products()->attach(Quotation::find($index));


//        $permissiongroup->permissions()->detach();


        return $index;




        //echo json_encode($request);
//        return $inserted;





//        if ($request->fileUp) {
//            $file = $request->file('fileUp');
//            $extension = $file->getClientOriginalExtension();
//            if($extension == "jpg" || $extension=="pdf")
//            {$filename = $file->getClientOriginalName();
//                $file->move('upload/Systems/SystemFour/', $filename);
//                $fullname = '/upload/Systems/SystemFour/'.$filename;
//            } else{
//                return back()->with('error', 'File extension must be .jpg or .pdf');
//            }
//            $inserted['filename'] = $fullname;
//        }
//
//        $data = Quotation::create($inserted);

//        print_r($data);


//        if ($data) {
//            return back()->with('success', 'Successfully Added!');
//        }else{
//            return back()->with('error', 'Something Went Wrong!');
//        }
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

    public function invoice() {
        return view('dashboard.Systems.SystemFour.invoice');
    }
}