<?php

namespace App\Listeners;

use App\Events\CartItemsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\CartItem;
use Illuminate\Queue\InteractsWithQueue;

class AddCartItems implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CartItemsEvent  $event
     * @return void
     */
    public function handle(CartItemsEvent $carts)
    {
            $orderNo = rand(111111111,999999999);
            foreach($carts as $cart){
            $data = [
                'user_id' => auth_user()->id,
                'product_id' => $cart->model->id,
                'Order_no' => $orderNo,
                'qty' => $cart->qty,
                'payable' => $cart->amount,
                'status' => 'pending'
            ];
            CartItem::create($data);
          }
    }
}
