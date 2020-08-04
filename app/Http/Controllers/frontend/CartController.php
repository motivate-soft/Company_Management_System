<?php

namespace App\Http\Controllers\frontend;

use App\Model\Cutting;
use App\Model\Packing;
use App\Model\Product;
use App\Model\ProductSize;
use App\Model\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
    
class CartController extends Controller
{
    public function index()
    {
        $plugin = DB::table('plugins')->where('id',2)->first();
        
        return view('frontend.main.checkout.cart',compact('plugin'));
    }

    public function addToCart(Request $request)
    {
        $plugin = DB::table('plugins')->where('id',2)->first();
        
        if($plugin->status == 1)
        {
            $validator = \Validator::make($request->all(), [
                'id' => 'required|exists:products,id',
                'size' => 'required|exists:sizes,id',
                'cutting' => 'required|exists:cuttings,id',
                'packing' => 'required|exists:packings,id',
            ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()]);
            }
            $id = $request->id;
    
            $product = Product::findOrFail($id);
            $size = Size::findOrFail($request->size);
            $cutting = Cutting::findOrFail($request->cutting);
            $packing = Packing::findOrFail($request->packing);
            $cart = session()->get('cart');
            $PriceSize = ProductSize::where('size_id', $request->size)->where('product_id', $id)->first();
            $SessionId = $size->id . $cutting->id . $packing->id . $id;
    
            // if cart is empty then this the first product
            if (!$cart) {
    
                $cart = [
                    $SessionId => [
                        "id" => $product->id,
                        "name" => $product->name_ar,
                        "quantity" => 1,
                        "price" => $product->price + $PriceSize->price + $cutting->price + $packing->price,
                        "size" => $size->name_ar,
                        "cutting" => $cutting->name_ar,
                        "packing" => $packing->name_ar,
                        "photo" => $product->image
                    ]
                ];
    
                session()->put('cart', $cart);
    
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
    
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$SessionId])) {
    
                $cart[$SessionId]['quantity']++;
    
                session()->put('cart', $cart);
    
                return redirect()->back()->with('success', 'Product added to cart successfully!');
    
            }
    
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$SessionId] = [
                "id" => $product->id,
                "name" => $product->name_ar,
                "quantity" => 1,
                "price" => $product->price + $size->productSize->price + $cutting->price + $packing->price,
                "size" => $size->name_ar,
                "cutting" => $cutting->name_ar,
                "packing" => $packing->name_ar,
                "photo" => $product->image
            ];
    
            session()->put('cart', $cart);
    
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else
        {
            $validator = \Validator::make($request->all(), [
                    'id' => 'required|exists:products,id',
                ]);
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()]);
            }
            $id = $request->id;
    
            $product = Product::findOrFail($id);
            $cart = session()->get('cart');
            $SessionId = $id;
    
            // if cart is empty then this the first product
            if (!$cart) {
    
                $cart = [
                    $SessionId => [
                        "id" => $product->id,
                        "name" => $product->name_ar,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->image
                    ]
                ];
    
                session()->put('cart', $cart);
    
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
    
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$SessionId])) {
    
                $cart[$SessionId]['quantity']++;
    
                session()->put('cart', $cart);
    
                return redirect()->back()->with('success', 'Product added to cart successfully!');
    
            }
    
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$SessionId] = [
                "id" => $product->id,
                "name" => $product->name_ar,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->image
            ];
    
            session()->put('cart', $cart);
    
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
