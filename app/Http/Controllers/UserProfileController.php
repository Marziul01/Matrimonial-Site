<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\MatchProfile;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PartnerProfile;
use App\Models\Plans;
use App\Models\Profile;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\Userinfo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Validation\Rule;
use App\Models\UserPlan;

class UserProfileController extends Controller
{

    public static function dashboard(){

        $userPlanActive = null;
        $userMatchDetails = null;
        $profiles = null;

        $user = auth()->user();
        $profile = $user->profile;
        $userPlan = $user->plans;
        $userMatchDetails = $user->match;

        if( is_null($profile) || $profile->image == null ){
            $profileComplete = null;
        }else{
            $profileComplete = true;
        }

        $userPlanActive = $userPlan->end_date;

        $planWarning = null;

        $userProfile = $user->userInfo;
        $lookingFor = $userProfile->looking_for;
        $plans = Plans::all();

        $currentPlan = $user->plans; // Assuming you have a relationship set up
        $now = now();

        // Check if the user's plan has expired
        if ($currentPlan && $currentPlan->end_date && $now->greaterThan($currentPlan->end_date)) {
            // Demote user to free plan
            $plan = new UserPlan();
            $plan->user_id = $user->id;
            $plan->plan_id = 1;
            $plan->star_date = now();
            $plan->save();

            $planWarning = 1;
        }

        if($profile !== null && $userMatchDetails == null){
            $fillMatchDetails = 'Yes';
        }else{
            $fillMatchDetails = 'No';

        }

        if($userMatchDetails !== null){
            // User's match preferences
            $lookingFor = $userMatchDetails->looking_for;
            $matchReligion = $userMatchDetails->religion;
            $matchMaritalStatus = $userMatchDetails->marital_status;
            $matchFromAge = $userMatchDetails->from_age;
            $matchToAge = $userMatchDetails->to_age;

            // Get users who are not looking for the same thing
            $eligibleUserIds = UserInfo::where('looking_for', '<>', $lookingFor)
            ->pluck('user_id');

            // Query profiles based on match criteria
            $profiles = Profile::whereIn('user_id', $eligibleUserIds)
                ->whereNotNull('user_id')
                ->where('status', 1) // Active profiles only
                ->where(function($query) use ($matchFromAge, $matchToAge) {
                    $query->whereRaw("TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN ? AND ?", [$matchFromAge, $matchToAge]);
                })
                ->where('religion', $matchReligion)
                ->where('marital_status', $matchMaritalStatus)
                ->paginate(20);
        }



        return view('frontend.dashboard.dashboard', [
            'profileComplete' => $profileComplete,
            'profiles' => $profiles,
            'profileDetails' => $profile,
            'UserPlanActive' => $userPlanActive,
            'UserPlanDetails' => $userPlan,
            'plans' => $plans,
            'planWarning' => $planWarning,
            'fillMatchDetails' => $fillMatchDetails,
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string|max:1000',
            'education_level' => 'required|string|max:255',
            'institute_name' => 'required|string|max:255',
            'working_with' => 'required|string|max:100',
            'employer_name' => [
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'designation' => [
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'duration' => [
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'monthly_income' => [
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
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

        if(Auth::user()->userInfo->looking_for == 'google'){
            $userInfo = Userinfo::find($userProfile->user_id);
            $userInfo->looking_for = $request->looking_for;
            $userInfo->gender = $request->gender;
            $userInfo->save();
        }

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'required|string|max:1000',
            'education_level' => 'required|string|max:255',
            'institute_name' => 'required|string|max:255',
            'working_with' => 'required|string|max:100',
            'employer_name' => [
                'string',
                'max:255',
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'designation' => [
                'string',
                'max:255',
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'duration' => [
                'string',
                'max:255',
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'monthly_income' => [
                'numeric',
                'min:0',
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
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

    public static function updateProfile(Request $request){

        $user = Auth::user();
        $profile = $user->profile;

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'religion' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'present_address' => 'required|string|max:255',
            'email' => ['required','email',Rule::unique('profiles', 'email')->ignore($profile->id),],
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
            'employer_name' => [
                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'designation' => [

                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'duration' => [

                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
            'monthly_income' => [

                Rule::requiredIf($request->working_with !== 'Not Working')
            ],
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

        $userupdateProfile = Profile::saveInfo($request);

        return response()->json(['success' => true,]);
    }


    public static function profiles($slug){
        $user = auth()->user();
        $currentPlan = $user->plans; // Assuming you have a relationship set up
        $now = now();

        if ($currentPlan->end_date == null || $now->greaterThan($currentPlan->end_date)) {
            return back();
        }


        list($firstName, $id) = explode('-', $slug);
        $user = Profile::where('user_id', $id)->first();

        $profile = $user;

        return view('frontend.profile.profile',[
            'profile' => $profile,
        ]);
    }

    public static function submitMatchProfile(Request $request){

        $validator = Validator::make($request->all(), [
            'from_age' => 'required |integer|min:18',
            'to_age' => 'required',
            'location' => 'nullable',
            'religion' => 'required',
            'marital_status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();
        $match = new MatchProfile();
        $match->user_id = $user->id;
        $match->looking_for = $user->userInfo->looking_for;
        $match->from_age = $request->from_age;
        $match->to_age = $request->to_age;
        $match->religion = $request->religion;
        $match->marital_status = $request->marital_status;
        $match->location = $request->location;
        $match->save();

        return response()->json(['success' => true,]);

    }

}
