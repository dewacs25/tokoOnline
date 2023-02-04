<?php

use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\AuthUserController;
use App\Http\Livewire\Frontend\Index;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('admin.auth');

Route::get('/', function () {
    return view('frontend.index');
});



Route::get('register',[AuthUserController::class,'register'])->name('register');
Route::post('register',[AuthUserController::class,'register_action'])->name('register.action');
Route::get('login',[AuthUserController::class,'login'])->name('login');
Route::post('login',[AuthUserController::class,'login_action'])->name('login.action');
Route::get('password',[AuthUserController::class,'password'])->name('password');
Route::post('password',[AuthUserController::class,'password_action'])->name('password.action');
Route::get('logout',[AuthUserController::class,'logout'])->name('logout');

Route::get('confirm/{token}',[AuthUserController::class,'confirmEmail'])->name('confirm.email');
Route::post('confirm/{token}',[AuthUserController::class,'confirmEmailAction'])->name('confirm.email.action');



Route::get('admin/auth/login',[AdminLogin::class,'login'])->name('admin.login');
Route::post('admin/auth/login',[AdminLogin::class,'login_action'])->name('admin.login.action');
Route::get('admin/auth/logout',[AdminLogin::class,'logoutAdmin'])->name('admin.logout');

