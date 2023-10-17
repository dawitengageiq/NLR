<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class UserActionEvent extends Event
{
    use SerializesModels;

    public $logData;

    /**
     * Create a new event instance.
     *
     * UserActionEvent constructor.
     *
     * @param  array  $logData
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
    public function broadcastOn(): array
    {
        return [];
    }
}
