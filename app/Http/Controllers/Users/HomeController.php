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
        $data['latest'] = Product::latest()->take(10)->get();
        $data['topProducts'] = Product::orderBy('views', 'DESC')->take(10)->get();
        $data['productCat'] = Product::where('category_id', 2)->inRandomOrder()->take(10)->get();
        addHashId($data['latest']);
        addHashId($data['topProducts']);
        addHashId( $data['productCat']);
        return view('users.dashboard', $data, [
            'sliders' => $slider,
           
        ]);
    }
}
