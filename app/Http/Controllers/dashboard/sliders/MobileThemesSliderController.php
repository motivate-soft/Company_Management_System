<?php
namespace App\Http\Controllers\dashboard\sliders;

use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileThemesSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.index',compact('sliders'));
    }


    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
            'image_en' => 'required|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()]);
        }
        $image = $request->image;
        $extension = $image->getClientOriginalExtension();
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $image->move('uploads/sliders/', $filename);

        $image_en = $request->image_en;
        $extension_en = $image_en->getClientOriginalExtension();
        $filename_en = uniqid() . '_' . time() . '.' . $extension_en;
        $image_en->move('uploads/sliders/', $filename_en);
        Slider::create([
            'image_ar' => $filename,
            'image_en' => $filename_en
        ]);
        return response()->json(
            [
                'message' => 'Added successfully',
            ],
            200
        );
    }




    public function destroy(Request $request)
    {
        $id = $request->id;
        Slider::findOrfail($id)->delete();
        return response()->json(
            [
                'message' => 'Deleted',
            ],
            200
        );
    }


}
