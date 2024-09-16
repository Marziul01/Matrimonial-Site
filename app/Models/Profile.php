<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Profile extends Model
{
    use HasFactory;

    public static function saveInfo($request) {

        $user = Auth::user();
        $fullName = $user->name;
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];
        $lastName = count($nameParts) > 1 ? $nameParts[count($nameParts) - 1] : '';
        $district = District::where('id', $request->district)->first();
        $upazila = Upazila::where('id', $request->upazila)->first();

        $profile = $user->profile;

        if (is_null($profile)) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        $profile->user_id = Auth::user()->id;
        $profile->first_name = $firstName;
        $profile->last_name = $lastName;
        $profile->gender = $request->gender;

        if($user->userInfo->looking_for == 'google' && $request->looking_for =='Groom' ){
            $profile->i_am = 'Bride';
        }elseif($user->userInfo->looking_for == 'google' && $request->looking_for =='Bride'){
            $profile->i_am = 'Groom';
        }elseif($user->userInfo->looking_for == 'Bride'){
            $profile->i_am = 'Groom';
        }elseif($user->userInfo->looking_for == 'Groom'){
            $profile->i_am = 'Bride';
        }

        if ($user->userInfo->looking_for == 'google' || !is_null($user->profile)) {

            $profile->religion = $request->religion;
            $profile->date_of_birth = Carbon::create($request->year, $request->month, $request->day);
            $profile->education_level = $request->education;

            $age = now()->year - $request->year;
        } else {

            $profile->religion = $user->userInfo->religion;
            $profile->date_of_birth = $user->userInfo->date_of_birth;
            $profile->education_level = $user->userInfo->education;

            $age = Carbon::parse($user->userInfo->date_of_birth)->age;
        }

        if($request->nationality == 'Bangladesh'){
            $profile->birth_place = $request->birth_place;
        }else{
            $profile->birth_place = $request->birth_place_text;
        }
        $profile->nationality = $request->nationality;
        $profile->present_address = $district->name . ','. $upazila->name;
        $profile->email = $user->email;
        $profile->contact_number = $request->phone;
        $profile->marital_status = $request->marital_status;
        $profile->blood_group = $request->blood_group;
        $profile->bad_habits = $request->bad_habit;
        $profile->height = $request->height;
        $profile->weight = $request->weight;
        $profile->desc = $request->desc;
        $profile->profession = $request->profession;
        $profile->location = $district->name;
        $profile->living_with_family = $request->living_with_family;
        $profile->body_type = $request->body_type;
        $profile->complexion = $request->complexion;
        $profile->family_status = $request->family_status;
        $profile->in_bangladesh_since = $request->in_bangladesh_since;
        $profile->monthly_income = $request->monthly_income;
        $profile->age = $age;


        $profile->institute_name = $request->institute_name;
        $profile->working_with = $request->working_with;
        $profile->employer_name = $request->employer_name;
        $profile->designation = $request->designation;
        $profile->duration = $request->duration;
        $profile->father_status = $request->father_status;
        $profile->mother_status = $request->mother_status;
        $profile->number_of_sibling = $request->number_of_sibling;
        $profile->family_type = $request->family_type;

        if ($request->file('image')) {
            if ($profile->image) {
                // Check if the existing image file exists and delete it
                $imagePath = public_path($profile->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            // Save the new image and update the profile's image field
            $profile->image = self::saveImage($request);
        }


        $profile->save();

        $user->name = $profile->first_name . ' ' . $profile->last_name;  // Concatenate first and last name with a space
        $user->number = $profile->contact_number;
        if ($request->file('image')) {
            if ($user->avatar) {
                // Check if the existing avatar file exists and delete it
                $avatarPath = public_path('storage/users-avatar/' . $user->avatar);
                if (file_exists($avatarPath)) {
                    unlink($avatarPath);
                }
            }
            $avatarUrl = $profile->image;
            $avatarimageName = basename($avatarUrl);

            $user->avatar = $avatarimageName;
        }

        $user->save();

        $userinfo = UserInfo::where('user_id', $user->id)->first();
        $userinfo->account_for = $request->account_for;
        if ($user->userInfo->looking_for == 'google') {
            $userinfo->looking_for = $request->looking_for;
        }
        $userinfo->save();

    }

    public static function saveImage($request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Check if the file is valid
            if (!$image->isValid()) {
                throw new \Exception("The file upload failed: " . $image->getErrorMessage());
            }

            $imageNewName = $request->first_name . rand() . '.' . $image->extension();

            // Define directories
            $dir1 = "frontend-assets/imgs/profiles/";
            $dir2 = "storage/users-avatar/";

            // Ensure the directories exist
            if (!file_exists(public_path($dir1))) {
                mkdir(public_path($dir1), 0777, true);
            }

            if (!file_exists(public_path($dir2))) {
                mkdir(public_path($dir2), 0777, true);
            }

            // Move image to the first directory
            $image->move(public_path($dir1), $imageNewName);

            // Copy image to the second directory
            $sourcePath = public_path($dir1 . $imageNewName);
            $destinationPath = public_path($dir2 . $imageNewName);

            // Ensure the source file exists before copying
            if (!file_exists($sourcePath)) {
                throw new \Exception("The source image does not exist.");
            }

            // Copy the file
            if (!copy($sourcePath, $destinationPath)) {
                throw new \Exception("Failed to copy the image to the second directory.");
            }

            // Return the URL of the image in the first directory
            return $dir1 . $imageNewName;
        }
        throw new \Exception("No file was uploaded.");
    }







    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function matchProfile()
    {
        return $this->hasOne(MatchProfile::class, 'user_id', 'user_id');
    }
}
