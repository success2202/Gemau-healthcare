<?php

namespace App\Http\Controllers\Users;

use App\Models\Privacypolicy;
use App\Http\Controllers\Controller;
use App\Models\TermsCondition;


class PageController extends Controller
{
    public function privacypolicy(){
        $privacypolicy = Privacypolicy::first();
        return  view('users.pages.privacy')
        ->with('privacypolicy', $privacypolicy);
    }

    public function Terms(){
        $termscondition = TermsCondition::first();
        return  view('users.pages.terms')
        ->with('termscondition', $termscondition);
    }

    public function aboutUs(){
        return  view('users.pages.aboutUs');
    }

    public function contactUs(){
        return view('users.pages.contactUs');
    }

}
