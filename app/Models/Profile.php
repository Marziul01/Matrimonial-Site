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
        $user->email = $profile->email;
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
