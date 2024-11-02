<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_id',   // ID of the user sending the request
        'recipient_id', // ID of the user receiving the request
        'status',      // Status of the request ('pending', 'accepted', 'rejected')
    ];

    // Optional: define relationships if needed
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
