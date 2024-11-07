<?php

namespace App\Http\Controllers;

use App\Models\ConnectionRequest;
use Illuminate\Http\Request;
use App\Models\Plans;
use App\Models\UserPlan;
use App\Models\Country;
use App\Models\District;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Upazila;
use Carbon\Carbon;
use Chatify\ChatifyMessenger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $profiles = Profile::where('status', 1 )->where('user_id', '!=', auth()->id())->where('contact_number' , '!=' , null)->get();
        $userProfile = auth()->user()->match;

        if(Auth::user()->profile && Auth::user()->match){
        $query = Profile::where('status', 1)
            ->where('contact_number', '!=', null)
            ->where('user_id', '!=', auth()->id())
            ->where('marital_status', $userProfile->marital_status)
            ->where('i_am', $userProfile->looking_for)
            ->where('religion', $userProfile->religion)->get();

        $recentVisitors = DB::table('profile_visits')
            ->select('visitor_id')
            ->where('visited_id', auth()->id())
            ->distinct()
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->pluck('visitor_id');
    
        // Fetch visitor profiles
        $visitorProfiles = Profile::whereIn('user_id', $recentVisitors)->where('status', 1)
        ->where('contact_number', '!=', null)->get();

        $visitedProfilesCount = DB::table('profile_visits')
            ->where('visited_id', auth()->id())
            ->where('created_at', '>=', Carbon::now()->subDay()) // filter for visits in the last 24 hours
            ->distinct('visited_id') // count unique visited profiles
            ->count('visited_id');
        }else{
        $query = $profiles;
        $visitorProfiles = $profiles;
        $visitedProfilesCount = 0;
        }
        

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
            'sents' => ConnectionRequest::where('sender_id', Auth::user()->id)->get(),
            'recevies' => ConnectionRequest::where('recipient_id', Auth::user()->id)->get(),
            'unseenMessageCount' => DB::table('ch_messages')->where('to_id', Auth::user()->id)->where('seen', '0')->count(),
            'matchprofiles' => $query,
            'visitorProfiles' => $visitorProfiles,
            'visitedProfilesCount' => $visitedProfilesCount,
        ]);
    }
}
