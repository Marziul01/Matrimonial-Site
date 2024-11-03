<?php

namespace App\Http\Controllers;

use App\Models\FaqSetting;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public static function index(){
        return view('frontend.pages.faq',[
            'faqs' => FaqSetting::all(),
        ]);
    }
}
