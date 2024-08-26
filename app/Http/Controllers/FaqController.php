<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public static function index(){
        return view('frontend.pages.faq',[

        ]);
    }
}
