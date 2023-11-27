<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

        //create order
        Order::create([
            'user_id' => auth_user()->id,
            'order_no' => $req->orderNo,
            'payable' => $req->amount,
            'payment_ref' => null,
            'payment_method' => 'Card Payment',
            'address_id' => $req->address_id,
            'is_paid' => 0,
            'is_delivered' => 0,
            'dispatch_status' => 0
        ]);

        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        //create shipment 
        //update orders
        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['status'] == true) {

            
        }else{

        }
    }
}
