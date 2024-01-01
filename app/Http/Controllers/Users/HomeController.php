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
        $data['latest'] = Product::latest()->inRandomOrder()->take(6)->get();
        $data['topProducts'] = Product::orderBy('views', 'DESC')->take(6)->get();
        $data['productCat1'] = Product::where('category_id', 24)->inRandomOrder()->take(9)->get();
        $data['productCat2'] = Product::where('category_id', 3)->inRandomOrder()->take(9)->get();
        $data['productCat'] = Product::where('category_id', 1)->inRandomOrder()->take(9)->get();
        $data['productCat'] = Product::where('category_id', 4)->inRandomOrder()->take(9)->get();
        $data['advert'] = Product::inRandomOrder()->take(3)->get();
        addHashId($data['latest']);
        addHashId($data['topProducts']);
        addHashId( $data['productCat1']);
        addHashId( $data['productCat2']);
        addHashId( $data['productCat3']);
        addHashId( $data['productCat4']);
        addHashId($data['advert']);
        return view('users.dashboard', $data, [
            'sliders' => $slider,
        ]);
    }
}
