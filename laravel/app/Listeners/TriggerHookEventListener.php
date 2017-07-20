<?php

namespace App\Listeners;

use App\Events\TriggerHookEvent;
use App\Exceptions\DomainException;
use App\Jobs\Task as TaskJob;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TriggerHookEventListener
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
     * @param  TriggerHookEvent $event
     * @return void
     */
    public function handle(TriggerHookEvent $event)
    {
        foreach ($event->getHook()->projects as $project) {
            try {
                $task = $project->createTask();
                $job = (new TaskJob($task))->onQueue('task');
                dispatch($job);
                continue;
            } catch (DomainException $e) {
                continue;
            }
        }
    }
}
