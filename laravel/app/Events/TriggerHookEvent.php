<?php

namespace App\Events;

use App\Hook;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TriggerHookEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $hook;

    /**
     * @return Hook
     */
    public function getHook(): Hook
    {
        return $this->hook;
    }

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Hook $hook)
    {
        $this->hook = $hook;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
