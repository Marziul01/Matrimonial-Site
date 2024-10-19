<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;
use App\Models\UserPlan;

use function PHPUnit\Framework\isNull;

class UserPlanController extends Controller
{

    public static function buyCredit(){
        return view('frontend.profile.plans',[
            'plans' => Plans::where('status', 1)->where('id', '!=', 1)->get(),
        ]);
    }

    public function subscribePlan(Request $request)
    {
        $planId = $request->input('plan_id');
        $plan = Plans::find($planId);

        if (!$plan) {
            return response()->json(['success' => false, 'message' => 'Invalid plan']);
        }

        $user = auth()->user();

        // Retrieve the user's current plan record, if any
        $userPlan = $user->plans;

        if (!$userPlan) {
            // If no existing plan, create a new UserPlan record
            $userPlan = new UserPlan();
            $userPlan->user_id = $user->id;
        }

        // Update the plan details (existing or new)
        $userPlan->plan_id = $plan->id;
        $userPlan->start_date = now();

        if ($plan->duration_in_days) {
            $userPlan->end_date = now()->addDays($plan->duration_in_days);
        } else {
            // Handle plans with no defined duration, if applicable
            $userPlan->end_date = null;
        }

        // Save the plan
        $userPlan->save();

        return response()->json(['success' => true, 'message' => 'Plan upgraded successfully']);
    }


}
