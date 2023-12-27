<?php

namespace App\Http\Controllers\Users;

use App\Events\CartItemsEvent;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\ShipmentLocation;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Services\RegisterUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegMail;
use App\Traits\CalculateShipping;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    use CalculateShipping;
 
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function Index($cartSession = null){
        if(!auth::check()){
            $check = new RegisterUser;
           return  $check->viewCheckout();
        }

        if(count(\Cart::content()) <= 0 || empty(\Cart::content())){
            return redirect()->intended(route('users.index'));
        }
        $carts = \Cart::content();
        $shipping_fee = 0;
        $orderNo = rand(111111111,999999999);

        $address = ShippingAddress::where(['user_id' => auth_user()->id, 'is_default' =>1])->first();
        if(!isset($address)){
            Session::flash('alert', 'error');
            Session::flash('msg', 'Please add a shipping address before you can proceed');
            return redirect()->intended(route('users.account.address'));
        }
        $states = ShipmentLocation::where('states', 'LIKE', ucfirst($address->state))->first();
            if(isset($states)){
        if(ucfirst(strtolower($states->states)) == 'Lagos'){  
            $gidi = [
                'location_to' => $address->city
            ];
            $response = $this->checkGidiRates($gidi);
            if(isset($response['data']['result'])){
            $shipping_fee = $response['data']['result'];
            }
        }else{
            $naijaship = [
                "destination" => $states->location,
                "weight" => 0.5
            ];
            $response =  $this->checkNaijaRates($naijaship);  
            if(isset($response['data']['fee'])){
            $shipping_fee = $response['data']['fee'];
            }
        }
        if($shipping_fee <= 0){
            Session::flash('alert', 'error');
            Session::flash('msg', 'Could not get shipping Fee, the address provided is wrong, please edit and try again');
        }
        
    }else{
        Session::flash('alert', 'error');
        Session::flash('msg', 'Network error occured, could not get shipping fee');
    }


        $cart = Hashids::connection('products')->decode($cartSession);
        $check = CartItem::where(['user_id' => auth_user()->id, 'cartSession' => $cart])->first();
        if(!isset($check) || empty($check)){
            event(new CartItemsEvent($carts, $orderNo, $cartSession));
        }
         $date['start'] = Carbon::now()->addDay(3);
         $date['end'] = Carbon::now()->addDay(6);

         
        return view('users.carts.checkout', $date)
        ->with('carts', $carts)
        ->with('address', $address)
        ->with('orderNo', $orderNo)
        ->with('shipping_fee',  $shipping_fee);
    }

    public function RegisterUser(Request $request){
        $userck = User::where('email', $request->email)->first();
        if($userck){
            Session::flash('alert', 'error');
            Session::flash('msg', 'This email address is already taken');
            return back()->withInput($request->all());
        }
        $register = new RegisterUser;
       $reg = $register->UserRegister($request);
    
        if($reg){
            return redirect()->intended(route('checkout.index'));
        }
       
        Session::flash('alert', 'error');
        Session::flash('msg', 'Something went wrong with your request');
        return back();
    }

}
