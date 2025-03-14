<?php

use App\Http\Controllers\TinController;
use Illuminate\Support\Facades\Route;
use Laravel\Tinker\TinkerCaster;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/News',[TinController::class,'index'])->name('news-index');

//lấy chi tiết cái id
Route::get('news/{id}',[TinController::class,'detailNews'])->name('news-detail');
Route::get('/about',[TinController::class,'about'])->name('news-about');
