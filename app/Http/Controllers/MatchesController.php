<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ConnectionRequest;
use App\Models\Profile;
use App\Models\ProfileVisit;
use Carbon\Carbon;

class MatchesController extends Controller
{
    public static function matches(Request $request)
    {
        // Redirect if profile, contact, or match details are incomplete
        if (Auth::user()->profile->name == null) {
            return redirect()->route('user.profile')->with('error', 'Please update your profile and match details first!');
        }
        if (Auth::user()->profile->contact_number == null) {
            return redirect()->route('user.profile.contact')->with('error', 'Please update your contact details!');
        }
        if (is_null(Auth::user()->match)) {
            return redirect()->route('user.profile.partner')->with('error', 'Please update your match preferences details!');
        }

        // Get the logged-in user's profile and match preferences
        $profile = auth()->user()->profile;
        $userProfile = auth()->user()->match;

        // Build the query with basic filters
        $query = Profile::where('status', 1)
            ->where('contact_number', '!=', null)
            ->where('user_id', '!=', auth()->id())
            ->where('marital_status', $userProfile->marital_status)
            ->where('i_am', $userProfile->looking_for)
            ->where('religion', $userProfile->religion);

        // Apply optional filters if they exist
        if ($request->has('near_me') && $userProfile->location) {
            $query->where('location', $profile->location);
        } else {
            $query->when($userProfile->location, function ($query) use ($userProfile) {
                return $query->where('location', $userProfile->location);
            });
        }

        if ($request->filled('age_from') && $request->filled('age_to')) {
            $query->whereBetween('age', [$request->age_from, $request->age_to]);
        } else {
            $query->when($userProfile->from_age && $userProfile->to_age, function ($query) use ($userProfile) {
                return $query->whereBetween('age', [$userProfile->from_age, $userProfile->to_age]);
            });
        }

        if ($request->filled('height_from') && $request->filled('height_to')) {
            $query->whereBetween('height', [$request->height_from, $request->height_to]);
        } else {
            $query->when($userProfile->height_from && $userProfile->height_to, function ($query) use ($userProfile) {
                return $query->whereBetween('height', [$userProfile->height_from, $userProfile->height_to]);
            });
        }

        if ($request->filled('education')) {
            $query->where('education_level', $request->education);
        } else {
            $query->when($userProfile->education, function ($query) use ($userProfile) {
                return $query->where('education_level', $userProfile->education);
            });
        }

        if ($request->filled('drinking_match')) {
            $query->where('drinking', $request->drinking_match);
        }

        if ($request->filled('smoking_match')) {
            $query->where('smoking', $request->smoking_match);
        }

        // Get strict matches
        $strictMatches = $query->get();

        // Check if any filters are applied
        $hasFilters = $request->filled('smoking_match') ||
                    $request->filled('drinking_match') ||
                    $request->filled('education') ||
                    ($request->filled('height_from') && $request->filled('height_to')) ||
                    ($request->filled('age_from') && $request->filled('age_to')) ||
                    $request->has('near_me');

        // If filters are applied, only use strict matches; otherwise, add less strict matches
        if ($hasFilters) {
            $profiles = $strictMatches;
        } else {
            $otherMatches = Profile::where('status', 1)
                ->where('contact_number', '!=', null)
                ->where('user_id', '!=', auth()->id())
                ->where('marital_status', $userProfile->marital_status)
                ->where('i_am', $userProfile->looking_for)
                ->where('religion', $userProfile->religion)
                ->whereNotIn('id', $strictMatches->pluck('id'))
                ->get();

            // Merge strict and other matches
            $profiles = $strictMatches->merge($otherMatches);
        }

        // Return view with profiles
        return view('frontend.user_pages.matches', [
            'profiles' => $profiles,
            'user' => Auth::user(),
        ]);
    }





    public static function matchesprofielView($name, $id, $number)
    {
        $profile = User::where('name', $name)->where('id', $id)->first();

        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }
        $lastThreeDigits = substr($profile->number, -3);

        if ($lastThreeDigits !== $number) {
            return redirect()->back()->with('error', 'Invalid profile.');
        }

        $loggedInUserId = Auth::id();

        if (Auth::check() && Auth::id() !== $id) {
            ProfileVisit::updateOrCreate(
                [
                    'visitor_id' => Auth::id(),
                    'visited_id' => $id,
                ],
                [
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Check if the logged-in user has sent a request
        $sentRequest = ConnectionRequest::where('sender_id', $loggedInUserId)
            ->where('recipient_id', $profile->id)
            ->whereIn('status', [1, 2])
            ->first();

        // Check if the profile user has sent a request to the logged-in user
        $receivedRequest = ConnectionRequest::where('sender_id', $profile->id)
            ->where('recipient_id', $loggedInUserId)
            ->whereIn('status', [1, 2])
            ->first();

        return view('frontend.user_pages.my_profile', [
            'profile' => $profile->profile,
            'userImages' => ImageGallery::where('user_id', $profile->id )->get(),
            'user' => Auth::user(),
            'receivedRequest' => $receivedRequest,
            'sentRequest' => $sentRequest,
        ]);
    }

}
