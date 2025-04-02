<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;
use Laravel\Tinker\TinkerCaster;
//use Laravel\Socialite\Facades\Socialite;

// Route::get('/', function () {
//     return view('welcome');
// });

// //middleware
// auth: Kiểm tra xem người dùng đã đăng nhập hay chưa.
// guest: Kiểm tra xem người dùng chưa đăng nhập.
// verified: Kiểm tra xem email của người dùng đã được xác minh hay chưa.
// throttle: Giới hạn số lượng yêu cầu mà người dùng có thể gửi đến một route.
Route::get('/', [TinController::class, 'index'])->name('news-index');
//login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('handlelogin', [LoginController::class, 'login'])->name('login.login');
Route::post('handleregister', [LoginController::class, 'register'])->name('login.register');
// Route cho đăng nhập Google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');

// Route cho callback từ Google
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');
//lấy chi tiết cái id
Route::get('news/{id}', [TinController::class, 'detailNews'])->name('news-detail');
Route::get('/about', [TinController::class, 'about'])->name('news-about');
//gửi mail
Route::get('/send-email', [EmailController::class, 'sendEmail'])->name('mail.send');
Route::post('/send-email', [EmailController::class, 'sendEmail']);
Route::get('/email/confirm', [EmailController::class, 'confirmEmail'])->name('email.confirm');
//up ảnh 
Route::get('upload', [ImageController::class, 'create'])->name('images.create');
Route::post('upload', [ImageController::class, 'store'])->name('images.store');
//quên mk
Route::get('forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request');
Route::get('account', [LoginController::class, 'showFormAccount'])->name('user.account');
Route::post('forgot-password', [LoginController::class, 'sendOtp'])->name('password.email');
Route::get('verify-otp', [LoginController::class, 'showVerifyOtpForm'])->name('otp.verify');
Route::post('verify-otp', [LoginController::class, 'verifyOtp'])->name('otp.verify.submit');
Route::get('reset-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [LoginController::class, 'handleResetPassword'])->name('password.update');
//middleware để vào admin
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/adminNews/add', [AdminController::class, 'addNews'])->name('adminnews.add');
    Route::post('/news/store', [AdminController::class, 'storeNews'])->name('news.store');
    Route::get('/news/update/{id}', [AdminController::class, 'editNews'])->name('news.edit');
    Route::put('/news/{id}', [AdminController::class, 'updateNews'])->name('news.update');
    Route::delete('/news/{id}', [AdminController::class, 'destroyNews'])->name('news.delete');
});
//require __DIR__.'/auth.php';
