<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public static function notifications(){
        return view('frontend.user_pages.notifications',[

        ]);
    }
}
