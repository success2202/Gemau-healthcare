<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;

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
        $products = Product::latest()->take(10)->get();
        foreach($products as $dd){
            $dd->hashid = Hashids::connection('products')->encode($dd->id);
            $dd->productUrl = trimInput($dd->name);
        }
        return view('users.dashboard', [
            'sliders' => $slider,
            'category' => Category::take(10)->get(),
            'latest' => $products
        ]);
    }
}
