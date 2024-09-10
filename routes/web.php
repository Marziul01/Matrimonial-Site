<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserPlanController;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\PlansController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/price',[PriceController::class,'index'])->name('price');
Route::get('/faq',[FaqController::class,'index'])->name('faq');
Route::get('/contact',[ContactController::class,'index'])->name('contact');

Route::group(['prefix' => 'account'],function(){
    Route::group(['middleware' => 'guest'],function(){
        Route::post('/user/register', [UserAuthController::class ,'userRegister'])->name('userRegister');
        Route::post('/user/login', [UserAuthController::class,'signin'])->name('user.login');
        Route::get('/login',[UserAuthController::class,'login'])->name('login');
    });

    Route::group(['middleware' => 'auth'],function(){
        Route::get('/user/logout',[UserAuthController::class,'logout'])->name('user.logout');
        Route::get('/user/dashboard',[UserProfileController::class,'dashboard'])->name('user.dashboard');
        Route::get('/user/profile',[UserProfileController::class,'viewProfile'])->name('user.profile');
        Route::post('/user/profile/submit', [UserProfileController::class,'submitProfile'])->name('profile.store');
        Route::post('/user/partner/profile/submit', [UserProfileController::class,'submitPartnerProfile'])->name('partner.profile.store');
        Route::post('/user/change/password', [UserProfileController::class,'updatePassword'])->name('user.pass.change');
        Route::post('/user/profile/update', [UserProfileController::class,'updateProfile'])->name('profile.update');
        Route::get('/check-current-plan', [UserPlanController::class,'CurrentPlan'])->name('check-current-plan');
        Route::post('/subscribe-plan', [UserPlanController::class,'subscribePlan'])->name('subscribe-plan');
        Route::get('/profiles/{slug}', [UserProfileController::class, 'profiles'])->name('profiles');
        Route::post('/user/profile/match', [UserProfileController::class,'submitMatchProfile'])->name('match.details.submit');
        Route::get('/googleLogin', [UserAuthController::class, 'googleLogin'])->name('googleLogin');
    });
});

Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');
        Route::get('/users',[UserController::class,'index'])->name('admin.users');
        Route::get('/users/profiles/{id}',[UserController::class,'profiles'])->name('admin.userProfile');
        Route::get('/users/partner/{id}',[UserController::class,'partners'])->name('admin.userPartner');
        Route::get('/users/profile/status/{id}/{status}',[UserController::class,'profileStatus'])->name('profileStatus');
        Route::get('/plans',[PlansController::class,'index'])->name('admin.plans');
        Route::post('/add/CreditPlan',[PlansController::class,'addCreditPlan'])->name('addCreditPlan');
        Route::post('/edit/CreditPlan/{id}',[PlansController::class,'editCreditPlan'])->name('editCreditPlan');
        Route::get('/delete/Plan/{id}',[PlansController::class,'deletePlan'])->name('deletePlan');
    });

});
