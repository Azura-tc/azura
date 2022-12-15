<?php

use App\Http\Controllers\Admin\Home;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard',[Home::class, 'index'])->name('dashboard');
    Route::get('/',[Home::class, 'index'])->name('dashboard');
    Route::get('/change-password', [Home::class, 'changePassword'])->name('setting.change-password');
    Route::get('/edit-profile', [Home::class, 'editeProfile'])->name('setting.edit-profile');
});
