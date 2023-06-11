<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\ProductController;
use \App\Http\Controllers\Frontend\IndexController;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Frontend\Auth\LoginController;
use \App\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use \App\Http\Controllers\Frontend\Auth\ResetPasswordController;
use \App\Http\Controllers\Frontend\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
// Route::get('product/{slug}/{color?}/{size?}', [ProductController::class, 'show'])->name('product');
Route::get('product/{slug}', [ProductController::class, 'show'])->name('product');
Route::resource('cart', CartController::class);

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