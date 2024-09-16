<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\Category;
use App\Models\Country;
use App\Models\District;
use App\Models\Profile;
use App\Models\SiteSetting;
use App\Models\Upazila;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserPlan;
use App\Notifications\NewOrderNotification;
use App\Notifications\NewUserNotification;
use Exception;
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
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;


class UserAuthController extends Controller
{
    private static $auth;

    public static function userRegister(Request $request) {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'gender'     => 'required|in:female,male',
            'looking_for' => 'required|in:bride,groom',
            'month'      => 'required',
            'day'        => 'required',
            'year'       => 'required',
            'religion'   => 'required',
            'education'  => 'required',
            'email'      => 'required|email|unique:users,email', // Unique email
            'password'   => 'required|min:8',
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
        self::$auth->email = $request->email;
        self::$auth->name = $request->first_name. '' . $request->last_name;
        self::$auth->save();

        Auth::login(self::$auth);
        $user = self::$auth->id;

        $userInfo = new UserInfo();
        $userInfo->user_id = $user;
        $userInfo->looking_for = $request->looking_for;
        $userInfo->gender = $request->gender;
        $userInfo->relation = null;
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->religion = $request->religion;
        $userInfo->email = $request->email;
        $userInfo->education_level = $request->education;
        $userInfo->date_of_birth = Carbon::create($request->year, $request->month, $request->day);
        $userInfo->save();

        $plan = new UserPlan();
        $plan->user_id = $user;
        $plan->plan_id = 1;
        $plan->start_date = now();
        $plan->end_date = null;
        $plan->save();

        return response()->json(['success' => true, 'redirect' => route('submitDetails')]);
    }

    public static function logout(){
        Auth::logout();
        return redirect(route('home'));
    }

    public function signin(Request $request){
    if (Auth::check()) {
        // Redirect to the user dashboard if logged in
        return response()->json([
            'success' => true,
            'redirect' => route('user.dashboard')
        ]);
    }

    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    // Attempt to login using number and password
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

        // Check if the user has a profile
        $profile = Auth::user()->profile;  // Assuming `profile` is a hasOne/belongsTo relation

        if ($profile) {
            // Check if the profile is blocked (status == 2)
            if ($profile->status == 2) {
                Auth::logout();  // Log out the user if the profile is blocked
                return response()->json([
                    'success' => false,
                    'message' => 'Your profile has been blocked.'
                ], 401);
            }
        }

        if(is_null($profile)){
            return redirect(route('submitDetails'));
        }

        // Redirect the user based on session URL or default to the dashboard
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
        // Invalid credentials
        return response()->json([
            'success' => false,
            'message' => 'Invalid email or password.'
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

    public static function details(){

        return view('frontend.auth.details', [
            'countries' => Country::all(),
            'districts' => District::all(),
            'upazilas' => Upazila::all(),
        ]);
    }


    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleHandler(){
        try {
            // Retrieve Google user data
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email', $user->email)->first();

            if (!$findUser) {
                // User not found, create new user
                $newUser = new User();
                $newUser->password = bcrypt(Str::random(8));
                $newUser->role = 0;  // Assuming role 0 for general users
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->save();

                // Log in the new user
                Auth::login($newUser);
                $userID = $newUser->id;

                // Create associated UserInfo
                $userInfo = new UserInfo();
                $userInfo->user_id = $userID;
                $userInfo->looking_for = 'google';
                $userInfo->gender = 'google';
                $userInfo->relation = 'google';
                $userInfo->save();

                // Assign default plan
                $plan = new UserPlan();
                $plan->user_id = $userID;
                $plan->plan_id = 1;  // Assuming plan_id 1 is a default plan
                $plan->start_date = now();
                $plan->end_date = null;
                $plan->save();

                return redirect(route('submitDetails'));
            }

            if ($findUser->profile && $findUser->profile->status == 2) {
                Auth::logout();
                return redirect(route('login'))->with('error', 'Your account is deactivated.');
            }

            Auth::login($findUser);
            return redirect(route('user.dashboard'));

        } catch (Exception $e) {

            Log::error('Google login error: ' . $e->getMessage());
            return redirect(route('login'))->with('error', 'Failed to log in using Google.');
        }
    }

    public function getUpazilas($districtId){
        // Fetch upazilas based on district ID
        $upazilas = Upazila::where('district_id', $districtId)->get();

        // Return the result as a JSON response
        return response()->json($upazilas);
    }



}
