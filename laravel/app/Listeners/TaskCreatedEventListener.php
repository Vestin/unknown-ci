<?php

namespace App\Listeners;

use App\Events\TaskCreatedEvent;
use App\Task;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskCreatedEventListener
{

    /**
     * @var Task
     */
    private $task;

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
     * @param  TaskCreatedEvent $event
     * @return void
     */
    public function handle(TaskCreatedEvent $event)
    {
        $this->task = $event->getTask();
    }

}
