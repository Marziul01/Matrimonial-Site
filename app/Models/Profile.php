<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    use HasFactory;

    public static function saveInfo($request) {

        $user = Auth::user();
        $profile = $user->profile;  // Retrieve the user's profile

        if (is_null($profile)) {
            // If the profile does not exist, create a new one
            $profile = new Profile();
            $profile->user_id = $user->id;  // Set the user_id to associate with the current user
        }

        $profile->user_id = Auth::user()->id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->gender = $request->gender;
        $profile->religion = $request->religion;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->birth_place = $request->birth_place;
        $profile->nationality = $request->nationality;
        $profile->present_address = $request->present_address;
        $profile->email = $request->email;
        $profile->contact_number = $request->contact_number;
        $profile->marital_status = $request->maritial_status;
        $profile->blood_group = $request->blood_group;
        $profile->hobby = $request->hobby;
        $profile->height = $request->height;
        $profile->weight = $request->weight;
        $profile->desc = $request->desc;
        $profile->education_level = $request->education_level;
        $profile->institute_name = $request->institute_name;
        $profile->working_with = $request->working_with;
        $profile->employer_name = $request->employer_name;
        $profile->designation = $request->designation;
        $profile->duration = $request->duration;
        $profile->monthly_income = $request->monthly_income;
        $profile->father_status = $request->father_status;
        $profile->mother_status = $request->mother_status;
        $profile->number_of_sibling = $request->number_of_sibling;
        $profile->family_type = $request->family_type;

        if ($request->file('image')){
            if ($profile->image){
                if (file_exists($profile->image)){
                    unlink($profile->image);
                }
            }
            $profile->image = self::saveImage($request);
        }

        $profile->save();
    }

    public static function saveImage($request){
        $image = $request->file('image');
        $imageNewName = $request->name.rand().'.'.$image->extension();
        $dir = "frontend-assets/imgs/profiles/";
        $imageUrl = $dir.$imageNewName;
        $image->move($dir,$imageUrl);
        return $imageUrl;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
