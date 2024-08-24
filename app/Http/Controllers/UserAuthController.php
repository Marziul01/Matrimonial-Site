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
            'relation' => 'nullable|string|required_if:account_for,others',
            'number' => 'required|numeric|unique:users,number',
            'terms' => 'accepted',
            'password' => 'required|min:8',
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

        Auth::login(self::$auth);
        $user = self::$auth->id;

        $userInfo = new UserInfo();
        $userInfo->user_id = $user;
        $userInfo->looking_for = $request->looking_for;
        $userInfo->account_for = $request->account_for;
        $userInfo->relation = $request->relation;

        $userInfo->save();

        return response()->json(['success' => true, 'redirect' => route('user.dashboard')]);
    }

    public static function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function signin(Request $request)
{
    if (Auth::check()) {
        // Redirect to the user dashboard if logged in
        return response()->json([
            'success' => true,
            'redirect' => route('user.dashboard')
        ]);
    }

    $validator = Validator::make($request->all(), [
        'number' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    if (Auth::attempt(['number' => $request->number, 'password' => $request->password], $request->get('remember'))) {
        if (session()->has('url.intended')) {
            return response()->json([
                'success' => true,
                'redirect' => session()->get('url.intended')
            ]);
        }

        return response()->json([
            'success' => true,
            'redirect' => route('user.dashboard')
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Invalid mobile number or password.'
        ], 401);
    }
}



    public static function login(){

        if (auth()->check()) {
            return redirect()->route('user.dashboard');
        }

        return view('frontend.auth.auth', [
        ]);
    }


}
