<?php

namespace App\Listeners\Illuminate\Listeners;

use App\Providers\NewCustomerRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCustomerNewsletter
{
   

    /**
     * Handle the event.
     *
     * @param  NewCustomerRegisteredEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegisteredEvent $event)
    {
        //register to newsletter

        dump('Register to newsletter');
    }
}
