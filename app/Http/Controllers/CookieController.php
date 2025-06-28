<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function accept(Request $request)
    {
        // Store consent for 1 year
        Cookie::queue('cookie_consent', 'accepted', 525600); // 1 year in minutes
        return back();
    }
}