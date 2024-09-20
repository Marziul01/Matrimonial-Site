<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public static function matches(){
        return view('frontend.user_pages.matches',[

        ]);
    }
}
