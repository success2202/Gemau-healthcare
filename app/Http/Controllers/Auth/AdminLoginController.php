<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    
    public function showLogin(){ 
        return view('auth.admin-login');
    }

    protected function guard(){

        return Auth::guard('admin');

    }
/**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo = '/admin';
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
