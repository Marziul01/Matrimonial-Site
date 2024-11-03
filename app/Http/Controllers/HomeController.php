<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\HomeSettings;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public static function index(){

        return view('frontend.home.home',[
            'profiles' => Profile::where('name', '!=', null )->get(),
            'testimonials' => HomeSettings::get(),
        ]);
    }

    public static function about(){

        return view('frontend.pages.about',[
            'about' => AboutSetting::find(1),
        ]);
    }

    public function fetchProfiles(Request $request)
    {
        $data = $request->validate([
            'looking_for' => 'required|string',
            'marital_status' => 'required|string',
            'address' => 'required|string',
        ]);

        // Fetch profiles based on the criteria, limiting to 8
        $profiles = Profile::where('i_am', $data['looking_for'])
                        ->limit(6)
                        ->get();

        // Return profiles as JSON
        return response()->json([
            'profiles' => $profiles,
            'marital_status' => $data['marital_status'],
            'address' => $data['address'],
        ]);
    }

    public static function reviews(){

        return view('frontend.pages.reviews',[
            'testimonials' => HomeSettings::get(),
        ]);
    }
}