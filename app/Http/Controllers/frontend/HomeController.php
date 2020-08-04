<?php

namespace App\Http\Controllers\frontend;

use App\Model\Product;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $sliders = Slider::all();
        return view('frontend.main.index', compact('products', 'sliders'));
    }
}
