<?php

namespace App\Http\Controllers\Users;

use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use App\Models\Services;
use App\Models\Privacypolicy;
use App\Models\TermsCondition;
use Vinkla\Hashids\Facades\Hashids;
use App\Http\Controllers\Controller;


class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        return  view('users.pages.privacy')
        ->with('policy', $privacypolicy);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        return  view('users.pages.terms')
        ->with('terms', $termscondition);
    }

    public function aboutUs(){
        return  view('users.pages.aboutUs')
        ->with('aboutUs', AboutUs::latest()->first());
    }

    public function contactUs(){
        return view('users.pages.contactUs');
    }

    public function products(){
        $products =  Product::latest()->simplePaginate(6);
        
        return view('users.pages.products')->with('product',$products);
    }

    public function Details($id){
        $latest =  Product::latest()->simplePaginate(6);
        foreach($latest as $bb){
            $bb->hashid = Hashids::connection('category')->encode($bb->id);
        }
        $id = Hashids::connection('category')->decode($id);
        $products = Product::findorfail($id[0]);
    return view('users.pages.product_details')
    ->with('products', $latest)
    ->with('product', $products);

    }

    public function services(){
        return view('users.pages.services')
        ->with('services', Services::latest()->first());
        // ->with('settings', Settings::first());
    }

    // public function blogs(){
    //     return view('users.pages.blogs')
    //     ->with('blogs', Blog::latest()->first());
    //     // ->with('settings', Settings::first());
    // }

}
