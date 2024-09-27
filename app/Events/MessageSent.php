<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use SerializesModels;

    public $message;
    public $sessionId;
    public $isAdmin;

    public function __construct($message, $sessionId, $isAdmin)
    {
        $this->message = $message;
        $this->sessionId = $sessionId;
        $this->isAdmin = $isAdmin;
    }

    public function broadcastOn()
    {
        return new Channel('chat.' . $this->sessionId);  // Broadcast to individual chat channel
    }
}
