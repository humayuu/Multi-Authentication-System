<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// Admins All Routes
Route::prefix('admin')->controller(AdminController::class)->group(function () {

    Route::patch('profile/update/{id}', 'ProfileUpdate')
        ->name('admin.profile.update')
        ->middleware('auth:admin');

    Route::get('login', 'AdminLoginPage')
        ->name('admin.login.page')
        ->middleware('guest:admin');

    Route::post('login', 'AdminLogin')
        ->name('admin.login')
        ->middleware('guest:admin');

    Route::get('dashboard', 'AdminDashboard')
        ->name('admin.dashboard')
        ->middleware('auth:admin');

    Route::get('profile/{id}', 'AdminProfile')
        ->name('admin.profile')
        ->middleware('auth:admin');

    Route::post('logout', 'AdminLogout')
        ->name('admin.logout')
        ->middleware('auth:admin');
});

// Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group(function () {
//     Route::post('login', 'AdminLogin')
//         ->name('admin.login')
//         ->middleware('guest:admin');

//     Route::patch('profile/{id}', 'ProfileUpdate')
//         ->name('profile.update')
//         ->middleware('auth:admin');

//     Route::get('profile/{id}', 'AdminProfile')
//         ->name('profile')
//         ->middleware('auth:admin');

//     Route::get('dashboard', 'AdminDashboard')
//         ->name('dashboard')
//         ->middleware('auth:admin');

//     Route::post('logout', 'AdminLogout')
//         ->name('logout')
//         ->middleware('auth:admin');
// });