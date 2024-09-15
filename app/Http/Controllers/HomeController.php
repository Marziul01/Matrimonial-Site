<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public static function index(){

        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }

        return view('frontend.home.home',[

        ]);
    }

    public static function about(){

        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }

        return view('frontend.pages.about',[

        ]);
    }
}
