<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');
    Route::get('/',[HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
});
