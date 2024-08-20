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
        Route::get('/user/profile',[UserProfileController::class,'index'])->name('user.profile');
        Route::get('/user/order/detail/{id}',[UserProfileController::class,'orderDetail'])->name('orderDetail');
        Route::post('/user/update/address/{id}',[UserProfileController::class,'updateAddress'])->name('updateBillingAddress');
        Route::post('/user/update/shippingAddress/{id}',[UserProfileController::class,'updateShippingAddress'])->name('updateShippingAddress');
        Route::post('/user/update/Info/{id}',[UserProfileController::class,'updateUserInfo'])->name('updateUserInfo');
        Route::get('/user/dashboard',[UserProfileController::class,'dashboard'])->name('user.dashboard');
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
