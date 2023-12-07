<?php

namespace App\Http\Controllers;

use App\Models\Privacypolicy;
use App\Models\TermsConditions;


class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        return  view('users.pages.privacy')
        ->with('privacypolicy', $privacypolicy);
    }

    public function Terms(){
        $termscondition = TermsConditions::first();
        return  view('users.pages.terms')
        ->with('termscondition', $termscondition);
    }

    public function about(){
        return  view('users.pages.aboutUs');
    }

    public function contactUs(){
        return view('users.pages.contactUs');
    }

}
