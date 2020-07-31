<?php

namespace App\Http\Controllers\dashboard\orders;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Invoice;
use App\Model\InvoiceTemplate;
use App\Model\UserAddress;
use PDF;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function downloadInvoice(Request $request) {

        $orderId = $request->order_id;

        $data = $this->getPDFData($orderId);
        
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('dashboard.orders.invoice.pdf', $data);

        // Finally, you can download the file using download function
        return $pdf->download('test.pdf');

    }

    public function getPDFData($orderId) {

        $locale = \App::getLocale();

        $order = Order::find($orderId);

        $template = InvoiceTemplate::first();
      
        $carts = $order->carts;

        $content = isset($template) ? $template->content : '';

        if (\App::getLocale() == 'ar') {
            $content = isset($template) ? $template->content_ar : '';
        }        
        $subtotal = 0;

        $product_names = [];
        $product_imgs = [];
        $product_qty = [];

        foreach($carts as $cart) {
            if (isset($cart->product)){
                $prod = $cart->product;
                $product_names[] = $locale == 'ar' ? $prod->name_ar : $prod->name;
                $img =  $prod->image == '' ? url('assets/images/no-image.jpg') : url('uploads/product_images').'/'.$prod->image;
                $product_imgs[] = '<img style="border-radius: 50%;" src="'.$img.'" class="img-fluid" width="35">';
                $product_qty[] = $cart->quantity;               
            }
            $subtotal += $cart->quantity * (isset($cart->product) ? $cart->product->price : 0);
        }
        $data['product_name'] = implode(',', $product_names);
        $data['product_img'] = implode(' ', $product_imgs);
        $data['product_qty'] = implode(',', $product_qty);
        $data['product_options'] = '';

        $data['order'] = $order;

        $data['user'] = $order->user;

        $data['user_address'] = UserAddress::where('user_id', $order->user->id)->first();

        $data['locale'] = $locale;
        $data['subtotal'] = $subtotal;
        // \DB::table('invoices')->updateOrInsert([
        //     'order_id' => $orderId,
        // ],$data);

        $data['content'] = $content;

        return $data;
    }

    public function printInvoice(Request $request){

        $orderId = $request->order_id;
        
        $data = $this->getPDFData($orderId);
        
        return view('dashboard.orders.invoice.pdf', $data);
    }

   
    public function templateList(){
        $data['template'] = InvoiceTemplate::first();
        return view('dashboard.orders.invoice.template',$data);
    }

    public function storeTemplate(Request $request) {
        $data['name'] = 'invoice template';
        $data['content'] = $request->template_content;
        $data['content_ar'] = $request->template_content_ar;
        $data['short_code'] = $request->short_code;

        $template = InvoiceTemplate::first();

        if (isset($template)) {
            $template->update($data);
        } else {
            $iTemp = new InvoiceTemplate($data);
            $iTemp->save();
        }

        return redirect(route('invoice.template.list'));
    } 

    public function updateTemplate(Request $request) {

    }
}
