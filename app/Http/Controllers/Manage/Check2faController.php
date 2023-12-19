<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\check2fa;
use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

class Check2faController extends Controller
{
    //

    public function Index(){
        $user = Admin::where('id', auth('admin')->user()->id)->first();
        $data['otp'] = rand(111111,999999);
        $data['subject'] = 'Login Code';
        $user->update(['otp' => $data['otp']]);
        Mail::to(Setting::pluck('site_email')[0])->send(new check2fa($data));
        return view('auth.2fa');
    }

    public function VerifyCode($code){
        $user = Admin::where('id', auth('admin')->user()->id)->first();
        if($user->otp == $code){
            return redirect()->route('admin.index');
        }else{
            Session::flash('alert', 'error');
            Session::flash('msg', 'The code you entered is invalid or Expired');
            Session::flash('resend');
        }
    }

}
