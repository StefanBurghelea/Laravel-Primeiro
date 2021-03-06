<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use App\Providers\NewCustomerRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;   


class WelcomeNewCustomerListener implements ShouldQueue
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
