<?php

use App\Events\LiveSupport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserPlanController;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use App\Http\Controllers\LiveSupportController;
use App\Http\Controllers\AdminLiveSupportController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;

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
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/price',[PriceController::class,'index'])->name('price');
Route::get('/faq',[FaqController::class,'index'])->name('faq');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/googleLogin', [UserAuthController::class, 'googleLogin'])->name('googleLogin');
Route::get('/auth/google/callback', [UserAuthController::class, 'googleHandler'])->name('googleHandler');
Route::get('/get-upazilas/{districtId}', [UserAuthController::class, 'getUpazilas']);
Route::post('/user/register', [UserAuthController::class ,'signUp'])->name('userRegister');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::post('/user-chat-support', [MessageController::class, 'userchatsupport'])->name('user-chat-support');



Route::group(['prefix' => 'account'],function(){
    Route::group(['middleware' => 'guest'],function(){

        Route::post('/user/login', [UserAuthController::class,'signin'])->name('user.login');
        Route::get('/signin',[UserAuthController::class,'login'])->name('login');
        Route::get('/signup',[UserAuthController::class,'register'])->name('register');
        Route::get('/forget/password',[UserAuthController::class,'forgetPass'])->name('forgetPass');
        Route::post('/password/verify-email', [UserAuthController::class, 'verifyEmail'])->name('password.verifyEmail');
        Route::post('/password/verify-code', [UserAuthController::class, 'verifyCode'])->name('password.verifyCode');
        Route::post('/password/reset', [UserAuthController::class, 'resetPassword'])->name('password.recovery');
        Route::post('/verify-code', [UserAuthController::class, 'verifyEmailCode'])->name('verifaction_code');

    });

    Route::group(['middleware' => 'auth'],function(){
        Route::get('/user/logout',[UserAuthController::class,'logout'])->name('user.logout');
        Route::get('/user/dashboard',[UserDashboardController::class,'dashboard'])->name('user.dashboard');
        Route::get('/user/profile',[UserProfileController::class,'viewProfile'])->name('user.profile');
        Route::post('/user/profile/submit', [UserProfileController::class,'submitProfile'])->name('profile.store');
        Route::post('/user/profile/submit/2', [UserProfileController::class,'submitProfiletwo'])->name('profile.storetwo');
        Route::post('/user/profile/submit/3', [UserProfileController::class,'submitProfilethree'])->name('profile.storethree');
        Route::post('/user/profile/submit/img', [UserProfileController::class,'submitProfileImg'])->name('profile.storeImg');
        Route::post('/user/partner/profile/submit', [UserProfileController::class,'submitPartnerProfile'])->name('partner.profile.store');
        Route::post('/user/change/password', [UserProfileController::class,'updatePassword'])->name('user.pass.change');
        Route::post('/user/profile/update', [UserProfileController::class,'updateProfile'])->name('profile.update');
        Route::get('/check-current-plan', [UserPlanController::class,'CurrentPlan'])->name('check-current-plan');
        Route::post('/subscribe-plan', [UserPlanController::class,'subscribePlan'])->name('subscribe-plan');
        Route::get('/profiles/{slug}', [UserProfileController::class, 'profiles'])->name('profiles');
        Route::get('/submit/profile/details', [UserAuthController::class, 'details'])->name('submitDetails');
        Route::post('/user/profile/match', [UserProfileController::class,'submitMatchProfile'])->name('match.details.submit');
        Route::get('/user/matches',[MatchesController::class,'matches'])->name('user.matches');
        Route::get('/user/notifications',[NotificationsController::class,'notifications'])->name('user.notifications');
        Route::get('/user/profile/images',[UserProfileController::class,'Profileimage'])->name('user.profile.images');
        Route::get('/user/profile/settings',[UserProfileController::class,'settingsProfile'])->name('user.profile.settings');
        Route::get('/user/buy/plan', [UserPlanController::class,'buyCredit'])->name('user.buy.credit');
        Route::post('/upload-images', [UserProfileController::class, 'uploadImages'])->name('profile.storeImggallery');
        Route::delete('/delete-image/{id}', [UserProfileController::class, 'deleteImage'])->name('deleteImageGallery');

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
        Route::post('/admin/search-users', [UserController::class, 'searchUsers'])->name('admin.searchUsers');
        Route::get('/admin/send-password-reset/{user}', [UserController::class, 'sendPasswordReset'])->name('admin.sendPasswordReset');
        Route::get('/admin/live_support', [AdminLiveSupportController::class, 'showMessages'])->name('admin.live_support');
        Route::get('/admin/live_support/chat/', [AdminLiveSupportController::class, 'getMessagesByUser'])->name('admin.chat.adminindex');
        Route::post('/admin/live_support-message', [AdminLiveSupportController::class, 'adminReplyMessage'])->name('admin-reply-mail');


    });

});
