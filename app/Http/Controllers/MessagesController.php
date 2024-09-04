<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MessagesController extends Controller
{
    public function index($id)
{
    $user = User::find($id);

    if (!$user) {
        // Handle the case where the user is not found
        return redirect()->route('home')->with('error', 'User not found');
    }

    // Load the chat interface with the user data
    return view('chat.index', ['user' => $user]);
}


public function idFetchData($user_id)
{
    $user = User::find($user_id);
    if (!$user) {
        return response()->json(['error' => 'User not found'], 404);
    }

    return response()->json([
        'id' => $user->id,
        'favorite' => $user->favorite,
        'fetch' => $user->fetch,
        'user_avatar' => $user->avatar
    ]);
}





}
