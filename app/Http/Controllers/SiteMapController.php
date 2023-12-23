<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteMapController extends Controller
{
    //
    public function SiteMap(){
       return asset('assets/sitemap.xml');
    }
}
