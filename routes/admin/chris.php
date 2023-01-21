<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
});

Route::name('front.')->group(function () {
    Route::get('/', [FrontHomeController::class, 'index'])->name('index');
});
