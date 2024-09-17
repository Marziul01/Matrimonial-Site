<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public static function index(){

        return view('frontend.home.home',[

        ]);
    }

    public static function about(){

        return view('frontend.pages.about',[

        ]);
    }
}
