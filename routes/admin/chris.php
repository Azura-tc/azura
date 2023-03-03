<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::resource('info', InformationController::class)->except(['create', 'destroy', 'store', 'show']);
    Route::resource('section', SectionController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('social', SocialController::class);
});

Route::name('front.')->group(function () {
    Route::get('/', [FrontHomeController::class, 'index'])->name('index');
    Route::get('/all', fn() => view('front.home.all'));
});
