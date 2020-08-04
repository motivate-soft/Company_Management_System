<?php

namespace App\Http\Controllers\frontend;

use App\Model\Cart;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['CheckAuth','CheckPhoneVerified']);
    }

    public function store(Request $request)
    {
        if (session('payment') && session('checkout') && session('cart')) {
            $address = session('checkout');
            $tax = DB::table('config_settings')->where('_key', 'tax')->first();
            $subtotal = 0;
            $delivery_fee = session('checkout')['address']['delivery_fee'];
            $total = (($delivery_fee + $subtotal) / 100) * ($tax->_value) + ($delivery_fee + $subtotal);
            foreach (session('cart') as $id => $details) {
                $subtotal += $details['price'] * $details['quantity'];
            }
            $order = Order::create([
                'user_id' => auth()->id(),
                'name' => session('checkout')['address']['first_name'] . ' ' . session('checkout')['address']['last_name'],
                'phone' => session('checkout')['address']['phone'],
                'country' => session('checkout')['address']['country'],
                'state' => session('checkout')['address']['state'],
                'city' => session('checkout')['address']['city'],
                'neighborhood' => session('checkout')['address']['neighborhood'],
                'address' => session('checkout')['address']['address'],
                'delivery_fee' => $delivery_fee,
                'payment_method' => session('payment')['payment_method'],
                'bank_id' => session('payment') ? session('payment')['bank']['id'] : NULL,
                'sub_total' => $subtotal,
                'vat' => $tax->_value,
                'total' => $total,
            ]);
            if ($order) {
                foreach (session('cart') as $id => $details) {
                    Cart::create([
                        'order_id' => $order->id,
                        'user_id' => auth()->id(),
                        'product_id' => $details['id'],
                        'quantity' => $details['quantity'],
                        'price' => $details['price'],
                    ]);
                }
            }
            session()->forget('cart');
            session()->forget('payment');
            session()->forget('checkout');
            return response()->json(
                [
                    'message' => 'done',
                ],
                200
            );
        } else {
            return response()->json(['errors' => "error"]);
        }
    }
}
