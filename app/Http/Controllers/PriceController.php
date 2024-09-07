<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public static function index(){
        return view('frontend.pages.price',[
            'plans' => Plans::where('status',1)->get(),
        ]);
    }
}
