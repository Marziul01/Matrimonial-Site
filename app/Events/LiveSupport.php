<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LiveSupport implements ShouldBroadcast
{
    public $message;
    public $sender;
    public $userId;

    public function __construct($message, $sender, $userId)
    {
        $this->message = $message;
        $this->sender = $sender; // 'user' or 'admin'
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new Channel('live-support.' . $this->userId);
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
