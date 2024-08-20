<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\UserInfo;
use App\Notifications\NewOrderNotification;
use App\Notifications\NewUserNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function Symfony\Component\String\b;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
    private static $auth;

    public static function userRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'looking_for' => 'required|in:bride,groom',
            'account_for' => 'required|in:myself,others',
            'relation' => 'nullable|string',
            'number' => 'required|numeric',
            'terms' => 'accepted',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        self::$auth = new User();
        self::$auth->password = bcrypt($request->password);
        self::$auth->role = 0;
        self::$auth->number = $request->number;
        self::$auth->save();

        $user = self::$auth->id;

        $userInfo = new UserInfo();
        $userInfo->user_id = $user;
        $userInfo->looking_for = $request->looking_for;
        $userInfo->account_for = $request->account_for;
        $userInfo->relation = $request->relation;

        $userInfo->save();

        // Flash a message to the session
        Session::flash('sweet-alert', 'Registration Successful! You have been registered and logged in.');

        return response()->json(['success' => true, 'redirect' => route('user.dashboard')]);
    }

    public static function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function signin(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'number' => 'required',
        'password' => 'required',
    ]);

    // If validation fails, return the validation errors as JSON
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422); // HTTP status code 422 for validation errors
    }

    // Attempt to log in the user
    if (Auth::attempt(['number' => $request->number, 'password' => $request->password], $request->get('remember'))) {

        // If there's an intended URL, redirect to it
        if (session()->has('url.intended')) {
            return response()->json([
                'success' => true,
                'redirect' => session()->get('url.intended')
            ]);
        }

        // Redirect to the user dashboard on successful login
        return response()->json([
            'success' => true,
            'redirect' => route('user.dashboard')
        ]);
    } else {
        // Return error response for failed login
        return response()->json([
            'success' => false,
            'message' => 'Invalid mobile number or password.'
        ], 401); // HTTP status code 401 for unauthorized access
    }
}


    public static function login(){
        return view('frontend.auth.auth', [

        ]);
    }

    public static function forgetResetLink(Request $request){
       $validator =  Validator::make($request->all(),[
           'email' => 'required|email|exists:users,email',
        ]);

       if ($validator->passes()){
           $token =  Str::random(60);

           DB::table('password_reset_tokens')->where('email', $request->email)->delete();

           DB::table('password_reset_tokens')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => now(),
           ]);

           $user = User::where('email', $request->email)->first();

           $mailData = [
             'token' => $token,
             'user' => $user,
           ];
           return redirect(route('forgetPassword'));

       }else{
           return back()->withInput()->withErrors($validator);
       }
    }

    public static function resetPassword($token){
        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
        if ($user !== null){
            return view('frontend.auth.resetPassword', [
            ]);
        }else{
            return redirect(route('forgetPassword'))->withErrors('Your password reset link is expired . Please try again !');
        }

    }

    public static function ResetPasswordForm(Request $request){
        $token = DB::table('password_reset_tokens')->where('token', $request->token)->first();
        $email = $token->email;

        if ($token !== null){
            $rules = [
                'password' => 'required|min:6',
                'confirm_password' => 'required|same:password',
            ];

            // Validation for other fields
            $validator = Validator::make($request->all(), $rules);

            if ($validator->passes()) {
                // Update user information
                $user = User::where('email', $email)->first();
                $user->password = Hash::make($request->password);
                $user->save();

                DB::table('password_reset_tokens')->where('email', $email)->delete();

                return redirect(route('userAuth'));
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return redirect(route('forgetPassword'))->withErrors('Your password reset link is expired . Please try again !');
        }

    }


}
