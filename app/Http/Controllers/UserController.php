<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.manage',[
            'users' =>  User::where('role', 0)->whereHas('profile')->with(['userInfo', 'profile'])->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
