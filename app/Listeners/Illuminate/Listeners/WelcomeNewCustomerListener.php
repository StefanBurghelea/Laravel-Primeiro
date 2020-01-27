<?php

namespace App\Listeners\Illuminate\Listeners;

use App\Providers\NewCustomerRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeNewCustomerListener
{
    /**
     * Handle the event.
     *
     * @param  NewCustomerRegisteredEvent  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
    }
}
