<?php

namespace App\Providers;

use App\Events\TaskCreatedEvent;
use App\Events\TriggerHookEvent;
use App\Listeners\TaskCreatedEventListener;
use App\Listeners\TriggerHookEventListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        TaskCreatedEvent::class => [
            TaskCreatedEventListener::class,
        ],
        TriggerHookEvent::class => [
            TriggerHookEventListener::class,
        ]
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
