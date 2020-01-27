<?php

namespace App\Listeners\Illuminate\Listeners;

use App\Providers\NewCustomerRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminSlack
{

    /**
     * Handle the event.
     *
     * @param  NewCustomerRegisteredEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegisteredEvent $event)
    {
        //Slak notfication to admin

        dump('Slack message here');
    }
}
