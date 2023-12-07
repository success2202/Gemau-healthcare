<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;


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

    public function store(LoginRequest $request)
    {
       
        $credentials = $request->only('email', 'password');

        if(Auth('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }


        return redirect()->back()->withInput($request->all())->withErrors('Email / Password not correct');
        
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
