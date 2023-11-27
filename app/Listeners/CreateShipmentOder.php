<?php

namespace App\Listeners;

use App\Events\OrderShipment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateShipmentOder implements ShouldQueue
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
     * @param  \App\Events\OrderShipment  $event
     * @return void
     */
    public function handle(OrderShipment $event)
    {
        //
    }
}
