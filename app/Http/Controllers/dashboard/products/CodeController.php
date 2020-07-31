<?php
namespace App\Http\Controllers\dashboard\products;

use App\Model\Code;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        if ($request->code) {
            Code::create([
                'code' => $request->code,
                'product_id' => $request->product_id,
            ]);

            return response()->json(array(
                'alert_type' => 'success',
                'msg_text' => 'Code Successfully Added!'
            ));
        }
    }

    public function update(Request $request)
    {

        $code = Code::findOrFail($request->id);
        $code->update([
            'code' => $request->code
        ]);

        return response()->json(array(
            'alert_type' => 'success',
            'msg_text' => 'Code Successfully Updates!'
        ));
    }

    public function destroy(Request $request)
    {

        $code = Code::findOrFail($request->id);
        $code->delete();

        return response()->json(array(
            'alert_type' => 'success',
            'msg_text' => 'Code Successfully Deleted!'
        ));

    }

}
