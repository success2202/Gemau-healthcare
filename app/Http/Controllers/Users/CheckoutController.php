<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Index(){
        $address = ShippingAddress::where('is_default', 1)->first();
        $address->hashid = Hashids::connection('products')->encode($address->id);
        return view('users.carts.checkout')
        ->with('carts', \Cart::content())
        ->with('address', $address);
    }

}
