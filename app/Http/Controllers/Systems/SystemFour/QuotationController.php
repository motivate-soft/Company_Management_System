<?php

namespace App\Http\Controllers\Systems\SystemFour;

use App\Model\dashboard\systems\SystemFour\ProductQuotation;
use App\Model\dashboard\systems\SystemFour\Quotation;
use App\Model\dashboard\systems\SystemOne\Customer;
use App\Model\dashboard\systems\SystemTwo\Staff;
use App\Model\Product;
use Exception;
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

        try {
            $inserted = ([
                'employee_id'   => $request->employee_id,
                'customer_id'   => $request->customer_id,
                'project_name'  => $request->project_name,
                'discount_rate' => $request->discount_rate,
                'purchase_info' => $request->purchase_info,
                'quo_description' => $request->quo_description
            ]);

            $quotation = new Quotation();

            $quotation->employee_id = $inserted['employee_id'];
            $quotation->customer_id = $inserted['customer_id'];
            $quotation->project_name = $inserted['project_name'];
            $quotation->discount_rate = $inserted['discount_rate'];
            $quotation->description = $inserted['quo_description'];
            $quotation->save();

            for($x = 0 ; $x < count($request->purchase_info) ; $x ++) {

                $productid = $request->purchase_info[$x]['product'];
                $quotation->products()->attach($productid, ["quantity" => $request->purchase_info[$x]["quantity"]]);
            }
            print_r(json_encode("success"));

        } catch (Exception $e)
        {

            return json_encode($e);
        }

//
////        $quotation->products()->save([0 => "1", 1 => "2", 2 => "3"]);
//        $quotation->products()->sync([1, 2]);
//
//        return $quotation;



//        $quotation->products()->save(Product::find($index));



//        $quotation->products()->attach(Quotation::find($index));


//        $permissiongroup->permissions()->detach();


//        return $index;




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
        $products  = Product::all();
        $select_products  = ProductQuotation::where('quotation_id', $id)->get();
        return view('dashboard.Systems.SystemFour.edit', compact('select_products', 'products', 'customers', 'employees', 'quotation'));

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

    public function modify(Request $request){

        try {
            $inserted = ([
                'employee_id'   => $request->employee_id,
                'customer_id'   => $request->customer_id,
                'project_name'  => $request->project_name,
                'discount_rate' => $request->discount_rate,
                'purchase_info' => $request->purchase_info,
                'quo_description' => $request->quo_description

            ]);
            $product_quotation = ProductQuotation::where('quotation_id', $request->quotation_id);
            $product_quotation->delete();
            $quotation = Quotation::find($request->quotation_id);

            $quotation->employee_id = $inserted['employee_id'];
            $quotation->customer_id = $inserted['customer_id'];
            $quotation->project_name = $inserted['project_name'];
            $quotation->discount_rate = $inserted['discount_rate'];
            $quotation->description = $inserted['quo_description'];
            $quotation->save();

            for($x = 0 ; $x < count($request->purchase_info) ; $x ++) {

                $productid = $request->purchase_info[$x]['product'];
                $quotation->products()->attach($productid, ["quantity" => $request->purchase_info[$x]["quantity"]]);
            }
            print_r(json_encode("success"));

        } catch (Exception $e)
        {

            return json_encode($e);
        }
    }
    public function changeStatus(Request $request){
        $quotation = Quotation::find($request->id);
        $quotation-> status = $request->status;
        $quotation-> save();

    }

    public function detail($id){
        $quotation = Quotation::where('id', $id)->first();
        return view('dashboard.Systems.SystemFour.detail', compact('quotation'));
    }

    public function invoice() {
        return view('dashboard.Systems.SystemFour.invoice');
    }
}