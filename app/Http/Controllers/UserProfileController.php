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
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileSubmittedMail;
use App\Mail\NewMatchFoundMail;
use Illuminate\Support\Facades\DB;
use App\Models\District;
use App\Models\ImageGallery;
use App\Models\Upazila;
use Hamcrest\Matchers;

class UserProfileController extends Controller
{

    public static function viewProfile(){
        return view('frontend.dashboard.profile',[
            'user' => Auth::user(),
            'countries' => Country::all(),
            'districts' => District::all(),
            'upazilas' => Upazila::all(),
            'profileDetails' => Profile::where('user_id', Auth::user()->id)->first(),
            'userImages' => ImageGallery::where('user_id', Auth::user()->id)->get(),
        ]); 
    }
    public static function Profileimage(){
        return view('frontend.profile.images',[
            'user' => Auth::user(),
            'profileDetails' => Profile::where('user_id', Auth::user()->id)->first(),
            'districts' => District::all(),
        ]);
    }
    public static function ProfileContact(){
        return view('frontend.profile.contact',[
            'user' => Auth::user(),
            'profileDetails' => Profile::where('user_id', Auth::user()->id)->first(),
        ]);
    }
    public static function settingsProfile(){
        return view('frontend.profile.settings',[
            'user' => Auth::user(),
            'profileDetails' => Profile::where('user_id', Auth::user()->id)->first(),
        ]);
    }


    public static function submitProfile(Request $request){

        $data = $request->all();
        $rules = [
            'gender' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'account_for' => 'required',
            'profession' => 'required',
            'living_with_family' => 'required',
            'body_type' => 'required',
            'complexion' => 'required',
            'family_status' => 'required',
            'nationality' => 'required|string|max:100',
            'blood_group' => 'required|string|max:10',
            'height' => 'required|string|max:10',
            'weight' => 'required|string|max:10',
            'smoking' => 'required',
            'drinking' => 'required',
            'education' => 'required',
            'education_institute' => 'required',
            'education_year' => 'required',
        ];

        // Conditionally add rules based on nationality
        if ($request->nationality !== 'Bangladesh') {
            $rules['birth_place_text'] = 'required';
        } else {
            $rules['birth_place'] = 'required';
        }

        if ($request->profession == 'Not Working') {
            $rules['position'] = 'nullable';
            $rules['monthly_income'] = 'nullable';
        } else {
            $rules['position'] = 'required';
            $rules['monthly_income'] = 'required';
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $userProfile = Profile::saveInfo($request);

        // Mail::to(Auth::user()->email)->send(new ProfileSubmittedMail(Auth::user()));

        // $age = Auth::user()->profile->age; // Calculate the age of the submitted profile

        // $matchingProfiles = DB::table('match_profile')
        //     ->where('looking_for', Auth::user()->profile->i_am) // Match looking_for with submitted profile's i_am (Groom/Bride)
        //     ->where('religion', Auth::user()->profile->religion)
        //     ->where('marital_status', Auth::user()->profile->marital_status)
        //     ->where('from_age', '<=', $age)
        //     ->where('to_age', '>=', $age)
        //     ->get();

        // // Send email to each matching profile
        // foreach ($matchingProfiles as $match) {
        //     $matchedUser = User::find($match->user_id); // Assuming match_profile has user_id

        //     if ($matchedUser) {
        //         Mail::to($matchedUser->email)->send(new NewMatchFoundMail($matchedUser, Auth::user()));
        //     }
        // }

        return response()->json(['success' => true,]);
    }

    public static function submitProfiletwo(Request $request){
        $data = $request->all();
        $rules = [
            'name' => 'required|string|max:50',
            'bio' => 'required|string|max:150',
            'year' => 'required',
            'day' => 'required',
            'month' => 'required',
            'location' => 'required',
            'religion' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();
        $profile = $user->profile;
        $profile->name = $request->name;
        $profile->religion = $request->religion;
        $profile->date_of_birth = Carbon::create($request->year, $request->month, $request->day);
        $age = now()->year - $request->year;
        $profile->location = $request->location;
        $profile->bio = $request->bio;
        $profile->age = $age;
        $profile->save();

        $user->name = $profile->name ;
        $user->save();
        return response()->json(['success' => true,]);
    }

    public static function submitProfilethree(Request $request){
        $data = $request->all();
        $rules = [
            'desc' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Auth::user();
        $profile = $user->profile;
        $profile->desc = $request->desc;

        $profile->save();

        return response()->json(['success' => true,]);
    }

    public static function submitProfileImg(Request $request){
        $profile = Auth::user()->profile;
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

        $user = Auth::user();
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
            'looking_for' => 'required|in:Groom,Bride',
            'from_age' => 'required|integer|min:18|max:45',
            'to_age' => 'required|integer|min:18|max:45|gte:from_age', // Ensure to_age is greater than or equal to from_age
            'marital_status' => 'required|string|in:Single,Divorced,Widowed,Awaiting Divorce',
            'religion' => 'required|string',
            'location' => 'nullable|string',
            'education' => 'nullable|string',
            'height_from' => 'nullable|string',
            'height_to' => 'nullable|string|gte:height_from', // Ensure height_to is greater than or equal to height_from
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Assuming you have a 'match_profiles' model linked with the user.
        $matchProfile = Auth::user()->match;
        if($matchProfile){
            $match = $matchProfile;
        }else{
            $match = new MatchProfile();
            $match->user_id = Auth::user()->id;
        }

        $match->looking_for = $request->looking_for;
        $match->from_age = $request->from_age;
        $match->to_age = $request->to_age;
        $match->marital_status = $request->marital_status;
        $match->religion = $request->religion;
        $match->location = $request->location;
        $match->education = $request->education;
        $match->height_from = $request->height_from;
        $match->height_to = $request->height_to;
        $match->save();

        $profile = Auth::user()->profile;
        if($request->looking_for == 'Bride'){
            $profile->i_am = 'Groom';
        }else{
            $profile->i_am = 'Bride';
        }

        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile preferences updated successfully!',
        ]);

    }

    public function uploadImages(Request $request)
    {
        // Validate each uploaded image
        $request->validate([
            'images.*' => 'image|max:2048', // Max 2MB per image
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Count existing images
        $existingImagesCount = ImageGallery::where('user_id', $userId)->count();

        // Determine how many more images can be uploaded
        $maxImages = 5;
        $canUpload = $maxImages - $existingImagesCount;

        // If the user is trying to upload too many images
        if ($canUpload <= 0) {
            return response()->json(['success' => false, 'message' => 'You can only have a maximum of 5 images.'], 400);
        }

        // Adjust the number of images the user can upload
        $imagesToUpload = min($canUpload, count($request->file('images')));

        // Get the authenticated user's name
        $username = auth()->user()->name;

        // Iterate through each uploaded image
        foreach ($request->file('images') as $image) {
            if ($imagesToUpload <= 0) break; // Stop if we reached the limit

            // Generate a unique filename using the username and timestamp
            $filename = $username . '_' . time() . '_' . $image->getClientOriginalName();

            $dir1 = "frontend-assets/imgs/profiles/";
            $image->move(public_path($dir1), $filename);

            // Save the image record to the database
            ImageGallery::create([
                'user_id' => $userId,
                'image' => $filename,
            ]);

            $imagesToUpload--; // Decrement the count
        }

        return response()->json(['success' => true, 'message' => 'Images uploaded successfully!']);
    }


    public function deleteImage($id)
    {
        // Find the image by ID
        $image = ImageGallery::findOrFail($id);

        // Check if the image belongs to the authenticated user
        if ($image->user_id == auth()->id()) {
            // Delete the image file from the public directory
            unlink(public_path('frontend-assets/imgs/profiles/' . $image->image));

            // Delete the image record from the database
            $image->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 403);
    }

    public function updateContactInfo(Request $request)
    {
        // Validate the phone number
        $validator = Validator::make($request->all(), [
            'number' => [
                'required',
                'numeric',
                'digits_between:10,15',
                Rule::unique('users', 'number')->ignore(Auth::id()), // Ignore the current user's number
            ],
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Get the currently authenticated user
        $user = Auth::user();

        // Update the user's phone number
        $user->number = $request->number;
        $user->save();

        $profile = $user->profile;
        $profile->email = $user->email;
        $profile->contact_number = $user->number;
        $profile->save();
        // Return a success message
        return response()->json([
            'success' => true,
            'message' => 'Contact information updated successfully!',
        ]);
    }

    public function toggleGalleryVisibility(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'show_images' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid input']);
        }

        // Update the user's show_images column
        $user = Auth::user()->profile;
        $user->show_images = $request->show_images;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Gallery visibility updated successfully']);
    }

    public function toggleContactVisibility(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'show_contact_info' => 'required|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => 'Invalid input']);
        }

        // Update the user's show_contact_info column
        $user = Auth::user()->profile;
        $user->show_contact = $request->show_contact;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Contact information visibility updated successfully']);
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

}
