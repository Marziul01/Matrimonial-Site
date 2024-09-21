<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Passwords\CanResetPassword; // Change this line
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords; // Ensure this is present

class ResetPasswordController extends Controller
{
    use CanResetPassword; // Change this line to use the correct trait

    // Show the reset password form
    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.auth.reset')->with([ 'token' => $token, 'email' => $request->email ]);
    }

    // Handle the password reset
    protected function reset(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Find the user by their email
        $user = \App\Models\User::where('email', $request->email)->first();

        // Reset the password
        $user->password = bcrypt($request->password);
        $user->save();

        // Optionally, send a confirmation message or redirect
        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }
}
