<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
  

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $req)
    {

        $data = array(
            "amount" => $req->amount * 100,
            "reference" => GenerateRef(20),
            "email" => auth_user()->email,
            "currency" => "NGN",
            "orderID" => $req->orderNo,

        );
        try{
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        if($paymentDetails['status'] == true){

        

        }

        dd($paymentDetails);
      
    
}
}
