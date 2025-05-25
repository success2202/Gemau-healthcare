<?php

namespace App\Http\Controllers\Users;

use App\Models\Blog;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Services;
use App\Models\Privacypolicy;
use App\Models\TermsCondition;
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
        return view('users.pages.products');
        // ->with('products', Product::latest()->first());
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
