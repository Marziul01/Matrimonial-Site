<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LiveSupportMessage;
use App\Models\Order;
use App\Models\Plans;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\User;
use App\Notifications\NewContactNotification;
use App\Notifications\ProductQtyNotification;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard.dashboard',[
            'users' => User::where('role', 0)->count(),
            'plans' => Plans::where('status', 1)->count(),
            'messages' => LiveSupportMessage::where('seen', 0)->count(),
        ]);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
