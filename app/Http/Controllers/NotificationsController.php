<?php

namespace App\Http\Controllers;

use App\Models\ConnectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public static function notifications(){
        return view('frontend.user_pages.notifications',[
            'sents' => ConnectionRequest::where('sender_id', Auth::user()->id)->get(),
            'recevies' => ConnectionRequest::where('recipient_id', Auth::user()->id)->get(),
        ]);
    }
}
