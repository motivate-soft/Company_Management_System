<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

use DB;

use App\Model\Order;
use App\User;
use Carbon\Carbon;
// use App\Model\Product;
// use App\Model\Product;




class HomeController extends Controller
{
    public $successStatus = 200;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */





    public function index()
    {
        return view('dashboard');
    }

    public function change_lng($locale)
    {
        \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    /**
     * Get All cities list
     */
    public function cities_list(Request $request)
    {

        $cities = DB::table('cities')->get();

        if ($request->header('accept')) {
            return response()->json(['cities' => $cities], $this->successStatus);
        }

        // return view('plans.list',$subadmins);

    }

    public function tbl_packing(Request $request)
    {

        $packing = DB::table('packings')->get();

        if ($request->header('accept')) {
            return response()->json(['packing_method_list' => $packing], $this->successStatus);
        }

        // return view('plans.list',$subadmins);

    }

    public function tbl_cutting(Request $request)
    {

        $cutting = DB::table('cuttings')->get();

        if ($request->header('accept')) {
            return response()->json(['cutting_method_list' => $cutting], $this->successStatus);
        }

        // return view('plans.list',$subadmins);

    }

    /**
     * Get Products List
     */
    public function product_list(Request $request)
    {
        $products = DB::table('products')->paginate(10);
        if ($request->header("accept") == 'application/json') {
            return response()->json(['Products' => $products], $this->successStatus);
        }
        // return view('plans.list',$subadmins);
    }

    /**
     * Product Packaging Method Titles
     */
    public function product_packaging_method(Request $request)
    {
        if ($request->packaging_method == '' || is_null($request->packaging_method)) {
            if ($request->header("accept") == 'application/json') {
                return response()->json(['Packaging' => ''], $this->successStatus);
            }
        }
        $packaging_method = explode('|', $request->packaging_method);
        $tbl_packing = DB::table('packings')->whereIn('id', $packaging_method)->pluck('name')->toArray();
        if (count($tbl_packing) > 0) {
            if ($request->header("accept") == 'application/json') {
                return response()->json(['Packaging' => implode(',', $tbl_packing)], $this->successStatus);
            }
        }
    }

    /**
     * VAT Tax API Endpoint
     */
    public function vat_tax_api(Request $request)
    {
        $tax = DB::table('config_settings')->where('_key', 'tax')->first();
        if ($request->header("Content-Type") == 'application/json') {
            return response()->json(['vat' => $tax->_value], $this->successStatus);
        }
    }

    public function admin_dashabord(){

        $data['total_products']=Product::count();
        $data['orders']=Order::count();
        $data['users']=User::count();
        $data['sold_items']=Order::where('status', 'completed')->count();
        $data['incoming']=Order::sum('total');
        $order_count = Order::count();
        if($order_count == 0) {
            $order_count = 1;
        }
        $data['average_revenue']=(Order::sum('total')-Order::sum('vat'))/$order_count;
        // $data['average_revenue']=0;

        $today=Carbon::now()->format('Y-m-d');
        $start_weekly_day=Carbon::now()->addDays(-7)->format('Y-m-d');

        $data['weekly_add_product']=Product::whereIn('created_at',[$start_weekly_day, $today])->count();
        

        $weekly_sold_add=Order::where('status', 'completed')->whereIn('created_at',[$start_weekly_day, $today])->count();
        if($data['sold_items'] == 0){
            $data['weekly_add_sold']=0;
        }else{
            $data['weekly_add_sold']=number_format($weekly_sold_add*100/$data['sold_items']);    
        }
        

        $weekly_incoming_add=Order::whereIn('created_at',[$start_weekly_day, $today])->sum('total');
        if($data['incoming'] != 0){
            $data['weekly_add_incoming']=number_format($weekly_incoming_add*100/$data['incoming']);
        }else{
            $data['weekly_add_incoming']=0;
        }



        $start_today_user=Carbon::now()->startOfDay();
        $start_today_order=Carbon::now()->startOfDay();
        $user_chart=[];
        $order_chart=[];

        for ($i=0; $i < 7; $i++) { 
            $user_data=User::whereBetween('created_at', [Carbon::now()->format('Y-m-d')." ".intval($i*4).":00:00"
                                , Carbon::now()->addHours(4)->format('Y-m-d')." ".intval($i*4+3).":59:59"])->count();

            $order_data=Order::whereBetween('created_at', [Carbon::now()->format('Y-m-d')." ".intval($i*4).":00:00"
                                , Carbon::now()->addHours(4)->format('Y-m-d')." ".intval($i*4+3).":59:59"])->count();
        
            array_push($user_chart, $user_data);
            array_push($order_chart, $order_data);
        }

        $data['user_chart']=json_encode($user_chart);
        $data['order_chart']=json_encode($order_chart);
        return view('dashboard/index', $data);
    }

    public function order_notif(){
        $not_orders=Order::where('is_notif', 0)->update([
            'is_notif' => 1
        ]);
        return response()->json('success');
    }

}
