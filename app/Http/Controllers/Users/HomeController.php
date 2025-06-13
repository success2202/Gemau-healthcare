<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Services;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Models\CountryCurrency;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;

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
        // getCountryCurrency();

    //     $ss =   getUserLocationData();
    //   $sss =   updateExchangeRate();
    //   $data = CountryCurrency::pluck('currency');
    //   $data =  $data->toArray();
    //   foreach($sss['conversion_rates'] as $rates => $value)
    //   {
    //     if(in_array($rates, $data))
    //     {
    //         $currency = CountryCurrency::where('currency', $rates)->first();
    //         $currency->update(['exchange_rate' => $value, 'last_updated' => Carbon::now()]);
    //     }
    //   }
    
        $slider = Slider::latest()->get();
        $aboutUs = AboutUs::first();
        $category = Category::latest()->simplePaginate(10);
        $product = Product::latest()->simplePaginate(9);
        $services = Services::latest()->simplePaginate(6);
        $data['latest'] = Product::latest()->inRandomOrder()->take(6)->get();
        $data['topProducts1'] = Product::orderBy('views', 'DESC')->take(6)->get();
        $data['productCat1'] = Product::where('category_id', 24)->inRandomOrder()->take(9)->get();
        $data['productCat2'] = Product::where('category_id', 3)->inRandomOrder()->take(9)->get();
        $data['productCat3'] = Product::where('category_id', 1)->inRandomOrder()->take(9)->get();
        $data['productCat4'] = Product::where('category_id', 4)->inRandomOrder()->take(9)->get();
        $data['advert'] = Product::inRandomOrder()->take(3)->get();
        addHashId($data['latest']);
        addHashId($data['topProducts1']);
        addHashId( $data['productCat1']);
        addHashId( $data['productCat2']);
        addHashId( $data['productCat3']);
        addHashId( $data['productCat4']);
        addHashId($data['advert']);
        return view('users.dashboard', $data, [
            'sliders' => $slider,
            'categories' => $category,
            'products' => $product,
            'service' => $services,
            'aboutUs' => $aboutUs
            
        ]);
    }

    public function Index(){
        $slider = Slider::latest()->get();
        $test = Testimonials::all();
        $team = Team::all();
        $aboutUs = AboutUs::first();
        $category = Category::latest()->simplePaginate(10);
        $product = Product::latest()->simplePaginate(9);
        $services = Services::latest()->simplePaginate(6);
        return view('users.dashboard')
        ->with('sliders', $slider)
        ->with('test', $test)
        ->with('categories', $category)
        ->with('service', $services)
        ->with('aboutUs', $aboutUs)
        ->with('team', $team)
        ->with('products', $product);

    }
}
