<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PartnerProfile;
use App\Models\Profile;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\Userinfo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{

    public static function dashboard(){

        $user = auth()->user();
        $profile = $user->profile;
        $profileComplete = $profile !== null;

        $userProfile = $user->userInfo;

        $lookingFor = $userProfile->looking_for;

        $eligibleUserIds = UserInfo::where('looking_for', '<>', $lookingFor)
        ->pluck('user_id');

        $profiles = Profile::whereIn('user_id', $eligibleUserIds)
            ->whereNotNull('user_id')
            ->paginate(20);

        return view('frontend.dashboard.dashboard',[
            'profileComplete' => $profileComplete,
            'profiles' => $profiles,
            'profileDetails' => $profile,
        ]);
    }

    public static function submitProfile(Request $request){

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'religion' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'present_address' => 'required|string|max:255',
            'email' => 'required|email|unique:profiles,email',
            'contact_number' => 'required|string|max:20',
            'maritial_status' => 'required|string|max:50',
            'blood_group' => 'required|string|max:10',
            'hobby' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string|max:1000',
            'education_level' => 'required|string|max:255',
            'institute_name' => 'required|string|max:255',
            'working_with' => 'required|string|max:100',
            'employer_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'monthly_income' => 'required|numeric|min:0',
            'father_status' => 'required|string|max:50',
            'mother_status' => 'required|string|max:50',
            'number_of_sibling' => 'required|integer|min:0',
            'family_type' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $userProfile = Profile::saveInfo($request);

        return response()->json(['success' => true,]);
    }

    public static function submitPartnerProfile(Request $request){

        $validator = Validator::make($request->all(), [
            'relation_with_partner' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'religion' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'present_address' => 'required|string|max:255',
            'email' => 'required|email|unique:partner_profiles,email',
            'contact_number' => 'required|string|max:20',
            'maritial_status' => 'required|string|max:50',
            'blood_group' => 'required|string|max:10',
            'hobby' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string|max:1000',
            'education_level' => 'required|string|max:255',
            'institute_name' => 'required|string|max:255',
            'working_with' => 'required|string|max:100',
            'employer_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'monthly_income' => 'required|numeric|min:0',
            'father_status' => 'required|string|max:50',
            'mother_status' => 'required|string|max:50',
            'number_of_sibling' => 'required|integer|min:0',
            'family_type' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $userPartnerProfile = PartnerProfile::saveInfo($request);

        return response()->json(['success' => true,]);
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Get the authenticated user
        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['success' => true]);
    }

}
