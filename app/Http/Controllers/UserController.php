<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    public function index()
    {
        // $user = User::where('role', 0)->whereHas('profile')->with(['userInfo', 'profile'])->orderBy('created_at', 'desc')->get();


        return view('admin.users.manage',[
            'users' =>  User::where('role', 0)->whereHas('profile')->with(['userInfo', 'profile'])->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function profiles($id)
    {
        $user = User::find($id);
        return view('admin.users.profile',[
            'profileDetails' =>  $user->profile,
        ]);
    }


    public function partners($id)
    {
        $user = User::find($id);
        return view('admin.users.partner',[
            'profileDetails' =>  $user->partnerProfile,
        ]);
    }

    public static function profileStatus($id, $status) {
        $profile = Profile::find($id);

        if ($profile) {
            $profile->status = $status;
            $profile->save();

            // Return back with a success message in the session
            return back()->with('success', 'Profile status updated successfully.');
        }

        // Return back with an error message if the profile is not found
        return back()->with('error', 'Profile not found.');
    }

}
