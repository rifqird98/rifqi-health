<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::resource('artikel', ArtikelController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::resource('home', HomeController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
});