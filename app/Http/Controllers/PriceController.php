<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function index(){
        return view('frontend.pages.price',[

        ]);
    }
}
