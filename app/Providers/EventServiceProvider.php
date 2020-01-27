<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Listeners\WelcomeNewCustomerListener;
use Illuminate\Listeners\RegisterCustomerNewsletter;
use Illuminate\Listeners\NotifyAdminSlack;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewCustomerRegisteredEvent::class => [
            WelcomeNewCustomerListener::class,
            RegisterCustomerNewsletter::class,
            NotifyAdminSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
