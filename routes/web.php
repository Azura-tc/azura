<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin Route
require_once __DIR__.DIRECTORY_SEPARATOR. 'admin' .DIRECTORY_SEPARATOR. 'chris.php';
require_once __DIR__.DIRECTORY_SEPARATOR. 'admin' .DIRECTORY_SEPARATOR. 'julien.php';
require_once __DIR__.DIRECTORY_SEPARATOR. 'admin' .DIRECTORY_SEPARATOR. 'salam.php';

// Front Route
require_once __DIR__.DIRECTORY_SEPARATOR. 'front' .DIRECTORY_SEPARATOR. 'chris.php';
require_once __DIR__.DIRECTORY_SEPARATOR. 'front' .DIRECTORY_SEPARATOR. 'julien.php';
require_once __DIR__.DIRECTORY_SEPARATOR. 'front' .DIRECTORY_SEPARATOR. 'salam.php';
