<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        $slider = Slider::latest()->get();
        return view('dashboard', [
            'sliders' => $slider,
            'category' => Category::take(10)->get(),
            'latest' => Product::latest()->take(10)->get(),
        ]);
    }
}
