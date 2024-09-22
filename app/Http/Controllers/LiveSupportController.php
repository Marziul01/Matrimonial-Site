<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Events\LiveSupport;

class LiveSupportController extends Controller
{
    public function storeMessage(Request $request)
{
    // Validate the message
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    // Generate a unique session ID for logged-out users
    if (!Session::has('live_support_user_id')) {
        Session::put('live_support_user_id', uniqid('user_', true));
    }

    $userId = Session::get('live_support_user_id');

    // Store the message in the database
    DB::table('live_support_messages')->insert([
        'user_id' => $userId,
        'from_id' => $userId,
        'to_id' => 1, // Assuming 1 is the admin's ID
        'message' => $request->message,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Broadcast the message via the LiveSupport event
    event(new LiveSupport($request->message, 'user', $userId));

    return response()->json(['success' => true]);
}

public function getMessages()
{
    // Check if the session has a unique user ID
    if (!Session::has('live_support_user_id')) {
        Session::put('live_support_user_id', uniqid('user_', true));
    }

    $userId = Session::get('live_support_user_id');

    // Fetch messages from the database for this user
    $messages = DB::table('live_support_messages')
                    ->where('user_id', $userId)
                    ->orderBy('created_at', 'asc') // Sort by oldest first
                    ->get();

    return response()->json(['messages' => $messages]);
}


public function getUserMessages()
{
    $userId = Session::get('live_support_user_id');

    // Fetch all messages for this user
    $messages = DB::table('live_support_messages')
        ->where('user_id', $userId)
        ->orWhere('to_id', $userId)
        ->orderBy('created_at')
        ->get();

    return response()->json(['messages' => $messages]);
}

}
