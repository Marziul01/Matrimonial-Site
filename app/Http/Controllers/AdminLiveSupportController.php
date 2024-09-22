<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\LiveSupport;
use App\Events\AdminReplied;




class AdminLiveSupportController extends Controller
{
    // AdminController.php
public function showMessages()
{
    // Get all users with their messages
    $users = DB::table('live_support_messages')
        ->select('user_id', DB::raw('MAX(created_at) as last_message_time'))
        ->groupBy('user_id')
        ->orderBy('last_message_time', 'desc')
        ->get();

    return view('admin.live_support.messages', compact('users'));
}

public function getMessagesByUser($userId)
{
    // Get chat history with a specific user
    $messages = DB::table('live_support_messages')
        ->where('user_id', $userId)
        ->orderBy('created_at')
        ->get();

        return view('admin.live_support.chat', compact('messages', 'userId'));

}

// AdminController.php
public function adminReplyMessage(Request $request)
{
    // Validate the request data
    $request->validate([
        'message' => 'required|string|max:1000',
        'user_id' => 'required|string',
    ]);

    // Insert the admin's message into the database
    DB::table('live_support_messages')->insert([
        'user_id' => $request->user_id,
        'from_id' => 1, // Admin ID
        'to_id' => $request->user_id, // The user receiving the message
        'message' => $request->message,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Broadcast the reply to the specific user channel
    event(new LiveSupport($request->message, 'admin', $request->user_id));

    return response()->json(['success' => true]);
}


}
