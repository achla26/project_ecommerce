<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\ProductController;
use \App\Http\Controllers\Frontend\IndexController;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Frontend\CouponController;
use \App\Http\Controllers\Frontend\UserController;
use \App\Http\Controllers\Frontend\AddressController;
use \App\Http\Controllers\Frontend\AjaxController;
use \App\Http\Controllers\Frontend\CheckoutController;
use \App\Http\Controllers\Frontend\Auth\LoginController;
use \App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use \App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use \App\Http\Controllers\Frontend\Auth\RegisterController;


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('product/{slug}', [ProductController::class, 'show'])->name('product');
Route::post('product-varient', [ProductController::class, 'varient'])->name('product.varient');


Route::prefix('user')->as('user.')->group(function () {
  Route::get('profile', [UserController::class, 'profile'])->name('profile');
  Route::post('update-profile', [UserController::class, 'updateProfile'])->name('update-profile');
  Route::get('order-history', [UserController::class, 'orderHistory'])->name('order-history');

  Route::resource('address', AddressController::class);
 
});
Route::prefix('checkout')->as('checkout.')->group(function () {
  Route::get('/', [CheckoutController::class, 'index'])->name('index');
});

Route::post('get-states', [AjaxController::class, 'getStates'])->name('get-states');
  Route::post('get-cities', [AjaxController::class, 'getCities'])->name('get-cities');
Route::prefix('cart')->as('cart.')->group(function () {
  Route::get('/', [CartController::class, 'index'])->name('index');
  Route::post('/', [CartController::class, 'store'])->name('store');
  Route::post('/destroy', [CartController::class, 'destroy'])->name('destroy');
  Route::post('/update', [CartController::class, 'update'])->name('update'); 
});

Route::prefix('coupon')->as('coupon.')->group(function () { 
  Route::post('/', [CouponController::class, 'store'])->name('add');
  Route::post('/destroy', [CouponController::class, 'destroy'])->name('destroy'); 
});

Route::post('apply-coupon', [CouponController::class, 'store'])->name('coupon.apply');
Route::post('remove-coupon', [CouponController::class, 'destroy'])->name('coupon.remove');

// Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

  // Password Reset Routes...
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('password/reset/{token}',  [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Registration Routes...
Route::get('register', [RegisterController::class , 'showRegistrationForm'])->name('register');

Route::post('register', [RegisterController::class , 'register'])->name('');