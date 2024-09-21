<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Password;

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

    public function searchUsers(Request $request)
        {
            $emailQuery = $request->input('email');
            $phoneQuery = $request->input('phone');

            $user = User::when($emailQuery, function ($query) use ($emailQuery) {
                    return $query->where('email', 'like', '%' . $emailQuery . '%');
                })
                ->when($phoneQuery, function ($query) use ($phoneQuery) {
                    return $query->orWhereHas('profile', function ($q) use ($phoneQuery) {
                        $q->where('phone_number', 'like', '%' . $phoneQuery . '%');
                    });
                })
                ->with('profile') // Make sure to include the profile relationship
                ->first();  // Get only the first user

            if ($user) {
                return response()->json(['user' => $user], 200); // Return user data as JSON
            } else {
                return response()->json(['user' => null], 200);  // No user found
            }
        }

        public function sendPasswordReset($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Send the password reset email using Laravel's built-in functionality
        $status = Password::sendResetLink(['email' => $user->email]);

        // Check if the reset link was successfully sent
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Password recovery email sent successfully to ' . $user->email);
        } else {
            return back()->with('error', 'Failed to send password recovery email.');
        }
    }


}
