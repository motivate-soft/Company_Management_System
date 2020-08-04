<?php

namespace App\Http\Controllers\frontend;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function product($id)
    {
        $plugin = DB::table('plugins')->where('id',2)->first();
        
        $product = Product::findOrFail($id);
        return view('frontend.main.products.detailed', compact('product','plugin'));
    }
}
