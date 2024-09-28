<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\LiveSupport;
use App\Events\AdminReplied;
use App\Models\LiveSupportMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportReplyMail;

class AdminLiveSupportController extends Controller
{

    public function getMessagesByUser()
    {
        $messages = LiveSupportMessage::where('seen', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.live_support.messages', compact('messages'));

    }

    public static function adminReplyMessage(Request $request) {
        // Find the message by ID
        $message = LiveSupportMessage::find($request->id);

        // Update the 'seen' status
        $message->seen = 1;
        $message->save();

        // Create a success message
        $successMessage = "Successfully sent message to " . $message->name;

        Mail::to($request->email)->send(new SupportReplyMail($request));

        // Return back with the success message
        return back()->with('success', $successMessage);
    }
}
