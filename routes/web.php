<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// User All Routes
Route::controller(UserController::class)->group(function () {
    Route::get('register', 'UserRegistration')->name('user.register');
});
