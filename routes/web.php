<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserMiddleware;
use App\Http\Middleware\loggedInUserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// User All Routes
Route::controller(UserController::class)->group(function () {
    Route::get('register', 'UserRegistration')->name('user.register')->middleware(loggedInUserMiddleware::class);;
    Route::get('login', 'UserLoginPage')->name('user.login')->middleware(loggedInUserMiddleware::class);
    Route::get('dashboard', 'UserDashboard')->name('user.dashboard')->middleware(CheckUserMiddleware::class);

    Route::post('store', 'UserStore')->name('user.store');
    Route::post('sign in', 'UserLoggedIn')->name('user.loggedIn');
    Route::post('logout', 'UserLogout')->name('user.logout');
});



// Admin All Routes
Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'AdminLoginPage')->name('admin.login.page');
        Route::get('/dashboard', 'AdminDashboard')->name('admin.dashboard');

        Route::post('login', 'AdminLogin')->name('admin.login');
        Route::post('logout', 'AdminLogout')->name('admin.logout');
    });
});