<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// users routes
Route::middleware(['auth', 'access-level:user'])->group(function () {
    Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
});

// admin routes
Route::middleware(['auth', 'access-level:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
});

// default Laravel home route
Route::get('/home', [HomeController::class, 'index'])->name('home');
