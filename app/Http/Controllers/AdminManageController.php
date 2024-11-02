<?php

namespace App\Http\Controllers;

use App\Models\AdminAccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManageController extends Controller
{
    public static function adminManager(){
        return view('admin.admins.manage',[
            'admins' => User::where('role', 1)->where('role_name', '!=', 'Super Admin' )->get(),
        ]);
    }

    public static function adminUManagepdate(Request $request, $id){
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'role_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // Ensure unique email except for this user
            'password' => 'nullable|string|min:8', // Password is nullable, only updated if provided
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->role_name = $request->input('role_name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->role = 1;
        $user->save();

        $userAccess = AdminAccess::where('user_id', $id)->first();
        $userAccess->user_id = $user->id;
        $userAccess->users = $request->users;
        $userAccess->orders = $request->orders;
        $userAccess->courses = $request->courses;
        $userAccess->blogs = $request->blogs;
        $userAccess->payment_methods = $request->payment_methods;
        $userAccess->coupons = $request->coupons;
        $userAccess->affiliate_commission = $request->affiliate_commission;
        $userAccess->site_settings = $request->site_settings;
        $userAccess->home_settings = $request->home_settings;
        $userAccess->save();


        // Redirect back with success message
        return redirect()->back()->with('success', 'Admin details updated successfully!');
    }

    public static function adminManageStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'role_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Ensure email is unique
            'password' => 'required|string|min:8', // Minimum password length
        ]);

        // Create a new admin user
        $user = new User();
        $user->name = $request->input('name');
        $user->role_name = $request->input('role_name'); // Assuming you have this column in your users table
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hash the password
        $user->role = 1; // Setting role to 1 for admin

        $user->save();

        $userAccess = new AdminAccess();
        $userAccess->user_id = $user->id;
        $userAccess->users = $request->users;
        $userAccess->orders = $request->orders;
        $userAccess->courses = $request->courses;
        // $userAccess->blogs = $request->blogs;
        // $userAccess->payment_methods = $request->payment_methods;
        // $userAccess->coupons = $request->coupons;
        // $userAccess->affiliate_commission = $request->affiliate_commission;
        $userAccess->site_settings = $request->site_settings;
        $userAccess->home_settings = $request->home_settings;
        $userAccess->save();

        return redirect()->back()->with('success', 'Admin created successfully!');
    }

    public static function adminManageDestroy(Request $request, $id){

        $user = User::findOrFail($id);

        if ($user->role != 1) {
            return redirect()->back()->with('error', 'The user is not an admin.');
        }

        $userAccess = AdminAccess::where('user_id', $id)->first();
        $userAccess->delete();

        $user->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully!');
    }

}
