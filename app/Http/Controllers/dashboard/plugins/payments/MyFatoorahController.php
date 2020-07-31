<?php
namespace App\Http\Controllers\dashboard\plugins\payment;

use App\Model\MyFatoorah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyFatoorahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $MyFatoorah = MyFatoorah::latest()->first();
        return view('plugins.my-fatoorah.index', compact('MyFatoorah'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|max:90',
            'password' => 'required|max:90',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        MyFatoorah::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return response()->json(
            [
                'message' => 'Added successfully',
            ],
            200
        );
    }

    public function changeStatus(){
        $MyFatoorah = MyFatoorah::latest()->first();
        if ($MyFatoorah->status){
            $active = false;
        }else{
            $active = true;
        }
        $MyFatoorah->update([
            'status' => $active,
        ]);
        return response()->json(
            [
                'message' => 'Updated successfully',
            ],
            200
        );
    }
}
