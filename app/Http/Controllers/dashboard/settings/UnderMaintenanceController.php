<?php
namespace App\Http\Controllers\dashboard\settings;
use App\Model\Setting;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class UnderMaintenanceController extends Controller
{
    public function underMaintenanceView()
    {
        $setting = Setting::findOrFail(1);
        return view('dashboard.settings.under-maintenance', compact('setting'));
    }

    public function underMaintenanceUpdate()
    {
        $setting = Setting::findOrFail(1);
        if ($setting->under_maintenance){
            $active = false;
        }else{
            $active = true;
        }
        $setting->update([
            'under_maintenance' => $active,
        ]);
        return response()->json(
            [
                'message' => 'Updated successfully',
            ],
            200
        );
    }
}