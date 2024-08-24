<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CkEditorController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\admin\ProductImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\PagesController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\admin\VariationController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\SslCommerzPaymentController;


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
    });

});
