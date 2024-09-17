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
use App\Mail\PasswordResetCodeMail;


class UserAuthController extends Controller
{
    private static $auth;

    public static function userRegister(Request $request)
    {
        // Check if user is already logged in
        if (Auth::check()) {
            return response()->json([
                'success' => false,
                'errors' => ['general' => ['You are already logged in.']],
                'redirect' => route('user.dashboard'),
            ], 422); // Use 422 status code for validation issues
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email', // Unique email
            'password'   => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Save user and related data
        $user = new User();
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->email = $request->email;
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->save();

        Auth::login($user);

        $userInfo = new UserInfo();
        $userInfo->user_id = $user->id;
        $userInfo->looking_for = $request->looking_for;
        $userInfo->gender = $request->gender;
        $userInfo->first_name = $request->first_name;
        $userInfo->last_name = $request->last_name;
        $userInfo->religion = $request->religion;
        $userInfo->email = $request->email;
        $userInfo->education_level = $request->education;
        $userInfo->date_of_birth = Carbon::create($request->year, $request->month, $request->day);
        $userInfo->save();

        $plan = new UserPlan();
        $plan->user_id = $user->id;
        $plan->plan_id = 1;
        $plan->start_date = now();
        $plan->end_date = null;
        $plan->save();

        return response()->json(['success' => true, 'redirect' => route('user.dashboard')]);
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

        if(isset(Auth::user()->profile) && isset(Auth::user()->match) ){
            return redirect(route('user.dashboard'));
        }

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


    public static function forgetPass() {
        return view('frontend.auth.forgetPassword',[

        ]);
    }

    public function verifyEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Email not found.']);
    }

    // Generate 6-digit verification code
    $code = rand(100000, 999999);

    // Store the code in session (or use a database to store temporary codes)
    Session::put('password_reset_code', $code);
    Session::put('password_reset_email', $user->email);

    try {
        // Send the code via email
        Mail::to($user->email)->send(new PasswordResetCodeMail($code));
    } catch (\Exception $e) {
        Log::error('Failed to send password reset email: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Failed to send email. Please try again later.']);
    }

    return response()->json(['success' => true, 'message' => 'Verification code sent to your email.']);
}

    // Step 2: Verify the code
    public function verifyCode(Request $request)
{
    $request->validate(['code' => 'required']);

    $storedCode = Session::get('password_reset_code');
    $storedEmail = Session::get('password_reset_email');

    if ($request->code == $storedCode) {
        // Return success along with stored email and code
        return response()->json([
            'success' => true,
            'email' => $storedEmail,
            'code' => $storedCode
        ]);
    } else {
        return response()->json(['success' => false, 'message' => 'Invalid code.']);
    }
}

    // Step 3: Reset password
    public function resetPassword(Request $request)
{
    $request->validate([
        'prevemail' => 'required|email',
        'prevcode' => 'required|integer',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $storedCode = $request->session()->get('password_reset_code');
    $storedEmail = $request->session()->get('password_reset_email');

    if ($storedCode != $request->prevcode || $storedEmail != $request->prevemail) {
        return response()->json(['success' => false, 'message' => 'Invalid code or email.']);
    }

    $user = User::where('email', $storedEmail)->first();
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    $user->password = bcrypt($request->password);
    $user->save();

    $request->session()->forget(['password_reset_code', 'password_reset_email']);

    return response()->json([
        'success' => true,
        'message' => 'Password successfully updated.',
        'redirect' => route('login')
    ]);
}




}
