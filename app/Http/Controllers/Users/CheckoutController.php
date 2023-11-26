<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ShipmentLocation;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;
use App\Traits\CalculateShipping;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    use CalculateShipping;
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){
        checkCart();
        $shipping_fee = 0;
        $address = ShippingAddress::where('is_default', 1)->first();
        $chk = explode(' ',$address->state);
        $states = ShipmentLocation::where('states', 'LIKE', ucfirst($chk[0]))->first();
        if($states->states == 'Lagos'){
            if(in_array($address->city,json_decode($states->location, true)))
            {   
            $gidi = [
                'location_to' => $address->city
            ];
                 $response = $this->checkGidiRates($gidi);
                $res = json_decode($response->getBody(),true);
            $shipping_fee = $res['data']['fee'];
        }else{
            $shipping_fee = '5000'; //flat feee
        }
        }else{
            $naijaship = [
                "destination" => $states->location,
                "weight" => 0.5
            ];
            $response =  $this->checkNaijaRates($naijaship);
            $res = json_decode($response->getBody(),true);
            $shipping_fee = $res['data']['fee'];
        }
         //possible delivery period
         $date['start'] = Carbon::now()->addDay(3);
         $date['end'] = Carbon::now()->addDay(6);
        return view('users.carts.checkout', $date)
        ->with('carts', \Cart::content())
        ->with('address', $address)
        ->with('shipping_fee',  $shipping_fee);
    
    }



}
