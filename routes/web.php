<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;
use Laravel\Tinker\TinkerCaster;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/News',[TinController::class,'news'])->name('news');
Route::get('/',[TinController::class,'index'])->name('news-index');

//lấy chi tiết cái id
Route::get('news/{id}',[TinController::class,'detailNews'])->name('news-detail');
Route::get('/about',[TinController::class,'about'])->name('news-about');
//gửi mail
Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('mail.send');
Route::post('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/email/confirm', [EmailController::class, 'confirmEmail'])->name('email.confirm');
//up ảnh 
Route::get('upload', [ImageController::class, 'create'])->name('images.create');
Route::post('upload', [ImageController::class, 'store'])->name('images.store');

//login
Route::get('login',[LoginController::class,'showLoginForm'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::post('handlelogin',[LoginController::class,'login'])->name('login.login');
Route::post('handleregister',[LoginController::class,'register'])->name('login.register');
//quên mk
// web.php
Route::get('forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [LoginController::class, 'sendOtp'])->name('password.email');
//Route::get('verify-otp', [LoginController::class, 'showVerifyOtpForm'])->name('otp.verify');
Route::post('verify-otp', [LoginController::class, 'verifyOtp'])->name('otp.verify.submit');
Route::get('reset-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [LoginController::class, 'handleResetPassword'])->name('password.update');