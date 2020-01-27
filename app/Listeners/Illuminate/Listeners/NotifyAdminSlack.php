<?php

namespace App\Listeners\Illuminate\Listeners;

use App\Providers\NewCustomerRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminSlack
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
     * @param  NewCustomerRegisteredEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegisteredEvent $event)
    {
        //
    }
}
