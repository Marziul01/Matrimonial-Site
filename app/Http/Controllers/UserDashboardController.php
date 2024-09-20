<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;
use App\Models\UserPlan;
use App\Models\Country;
use App\Models\District;
use App\Models\Profile;
use App\Models\Upazila;

class UserDashboardController extends Controller
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


        $plans = Plans::all();
        $currentPlan = $user->plans;
        $now = now();

        if ($currentPlan && $currentPlan->end_date && $now->greaterThan($currentPlan->end_date)) {
            $plan = new UserPlan();
            $plan->user_id = $user->id;
            $plan->plan_id = 1;
            $plan->star_date = now();
            $plan->save();

            $planWarning = 1;
        }

        $profiles = Profile::where('status', 1 )->get();

        return view('frontend.dashboard.dashboard', [
            'profileComplete' => $profileComplete,
            'profiles' => $profiles,
            'profileDetails' => $profile,
            'UserPlanActive' => $userPlanActive,
            'UserPlanDetails' => $userPlan,
            'plans' => $plans,
            'planWarning' => $planWarning,
            'countries' => Country::all(),
            'districts' => District::all(),
            'upazilas' => Upazila::all(),
            // 'fillMatchDetails' => $fillMatchDetails,
        ]);
    }
}
