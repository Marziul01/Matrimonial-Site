<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public static function index(){

        if (Auth::check()) {
            // Redirect to the user dashboard if logged in
            return redirect()->route('user.dashboard');
        }

        return view('frontend.home.home',[

        ]);
    }
}
