<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class CookieController extends Controller
{
    //
     public function Accept(Request $request)
    {
        // Set cookie for 1 year
        Cookie::queue('cookie_consent', '1', 525600); // minutes = 1 year
        return back();
    }
}
