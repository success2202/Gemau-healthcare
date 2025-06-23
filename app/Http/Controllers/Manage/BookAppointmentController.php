<?php

namespace App\Http\Controllers\Manage;
use App\Models\BookAppoint;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BookAppointmentController extends Controller
{
    //
     public function Delete($id){
        $bk = BookAppoint::where('id', decrypt($id))->first();
        if($bk){
            $bk->delete();
            Session::flash('alert', 'error');
            Session::flash('msg', 'Appointment Deleted Successfully');
            return back();
        }
        Session::flash('alert', 'error');
        Session::flash('alert', 'Somthing went wrong');
        return back();
    }
}
