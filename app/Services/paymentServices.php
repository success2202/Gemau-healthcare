<?php 

namespace App\Services;

use App\Events\OrderShipment;
use App\Interfaces\paymentInterface;
use App\Mail\OrderMail;
use App\Models\CountryCurrency;
use App\Models\Order;
use App\Models\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;

class paymentServices extends baseFuncs implements paymentInterface 
{

    public function InitiatePayment($request)
    {
        if ($request->payment_method == 'paystack') return $this->initiatePaystackCheckout($request);
        if ($request->payment_method == 'flutter')  return $this->initiateFlutterCheckout($request);
    }


    public function initiatePaystackCheckout($req)
    {
        $data = array(
            "amount" => $req->amount * 100,
            "reference" => GenerateRef(20),
            "email" => auth_user()->email,
            "currency" => $req->currency,
            "order_id" => $req->orderNo,
            "metadata" => $req->orderNo,
            "payment_method" => $req->payment_method
        );
        Parent::createOrder($req);
        Session::put('order_No', $req->orderNo);
        Session::put('amount',$req->amount);
       $shippingInfo = $this->getAddress($req);
        Mail::to(auth()->user()->email)->send( new OrderMail($shippingInfo));
      return Paystack::getAuthorizationUrl($data)->redirectNow();

    }

    public function initiateFlutterCheckout($request)
    {
        $userData =   getUserLocationData();
       
        // dd($userData);
        $currency = CountryCurrency::where('country', $userData['country'])->first();
        //   dd($currency);
        $txRef = 'TX-' . time();
        // dd($currency->exchange_rate);
        // dd($request->amount*$currency->exchange_rate);
        $data = [
            'tx_ref' =>  $txRef,
            'amount' => $request->amount*$currency->exchange_rate,
            'currency' => $currency->currency,
            'redirect_url' => url('flutter/callback'),
            'customer' => [
                'email' => auth_user()->email,
                'name' => auth_user()->first_name.' '.auth_user()->first_name,
                'phonenumber' => auth_user()->phone
            ],
            'customizations' => [
                'title' => 'payment for services'
            ]
        ];
        // dd( $data);
       $res = parent::getFlutterPaymentLink('https://api.flutterwave.com/v3/payments',$data);
            if ($res['status'] === 'success') {
                Parent::createOrder($request);
        
                Session::put('order_No', $request->orderNo);
                Session::put('amount',$request->amount);
                return redirect($res['data']['link'])
                ->header('Content-Type', 'text/html');
            }
            return back()->with('error', 'Unable to initialize payment');
    }

    public function HanglePaystackPayment($request){
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
        if ($request['status'] == true) {
           $order_no =  Session::get('order_No');
            $orders = Order::where('order_no', $order_no)->first();
          
            $orders->update([
                'external_ref'=> $request['reference'],
                'is_paid' => 1,
                'channel' => 'Paystack'
            ]);
            $ref = GenerateRef(10);
            $this->storePaymentInfo($order_no, $request, $ref);
            if($orders->shipping_method == 'home_delivery'){
           event(new OrderShipment($address, $order_no));
            }
        $this->sendPaymentEmail($request, $order_no, $ref);
        Cart::destroy();
            return true;
        }else{
            return false;
        }
    }

    public function ProcessFlutterPayment($request)
    {
        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' => 1])->first();
      $res =  parent::flutterwaveVerify($request['transaction_id']);
     if($res['status'] == 'success')
     {
        $order_no =  Session::get('order_No');
        $orders = Order::where('order_no', $order_no)->first();
        $ref = GenerateRef(10);
        $orders->update([
            'external_ref'=> $res['data']['flw_ref'],
            'is_paid' => 1,
            'channel' => 'Flutterwave'
        ]);
            $this->storePaymentInfo($order_no, $res['data'], $ref);
            if($orders->shipping_method == 'home_delivery'){
                event(new OrderShipment($address, $order_no));
                 }
            $this->sendPaymentEmail($request, $order_no, $ref);
            Cart::destroy();
     }
     return false;
    }

}