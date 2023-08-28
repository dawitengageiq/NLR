<?php

namespace App\Events;

use App\Events\Event;
use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Log;

class UserActionEvent extends Event
{
    use SerializesModels;

    public $logData;

    /**
     * Create a new event instance.
     *
     * UserActionEvent constructor.
     * @param array $logData
     */
    public function __construct($logData = [])
    {
        $this->logData = $logData;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
