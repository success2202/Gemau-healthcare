<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Mail\ManualPaymentEmail;
use App\Models\CountryCurrency;
use App\Models\ManualPayment;
use App\Models\Product;
use App\Services\paymentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ManualPaymentController extends Controller
{
    //
    public function __construct(
        public readonly paymentServices $generatePayment
    )
    {
        
    }

    public function Index()
    {
        return view('manage.payments.index')
        ->with('bheading', 'Manual Payment')
        ->with('breadcrumb', 'Manual Payment')
        ->with('payments', ManualPayment::get());
    }

    public function create()
    {
        return view('manage.payments.generate')
        ->with('currency', CountryCurrency::get())
        ->with('products', Product::get())
        ->with('bheading', 'Manual Payment')
        ->with('breadcrumb', 'Manual Payment');
    }

    public function AdminInitiatePayment(Request $request)
    {
        $generated = $this->generatePayment->AdminInitiatePayment($request);
        if($generated){
            Session::flash('alert', 'success');
            Session::flash('message', 'Payment Information sent to user email');
            return redirect()->intended(route('admin.manual.payments'));
        }
        Session::flash('alert', 'error');
        Session::flash('message', 'Something went wrong');
        return redirect()->intended(route('admin.create.payments'));
        
    }

    public function SendEmail(Request $request)
    {
        try{
        $paymantData = ManualPayment::where('id', $request->payment_id)->first();
        Mail::to('mikkynoble@gmail.com')->send(new ManualPaymentEmail($paymantData));
        Session::flash('alert', 'success');
        Session::flash('message', 'Payment Information sent to user email');
        return back();
        }catch(\Exception $e)
        {
            Session::flash('alert', 'error');
            Session::flash('message', $e->getMessage());
            return back();
        }
    }
}
