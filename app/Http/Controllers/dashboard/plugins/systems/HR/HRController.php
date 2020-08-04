<?php
namespace App\Http\Controllers\dashboard\plugins\systems\HR;

use App\Model\Malath;
use App\Model\MyFatoorah;
use App\Model\Setting;
use App\Model\Size;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Controllers\Controller;

class HRController extends Controller
{
    public $successStatus = 200;

    public function index()
    {
return view('dashboard.plugins.systems.HR.listOfJob.index');
    }


}
