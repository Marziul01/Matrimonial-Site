<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class PrivateMessage implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
{
    return [
        new PrivateChannel('chat.' . $this->message->to_id), // Target user/admin
        new PrivateChannel('chat.' . $this->message->from_id), // Also broadcast to sender
    ];
}


    public function broadcastAs()
    {
        return 'message.sent';
    }
}
