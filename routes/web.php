<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\isAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// All Admins Routes
Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'AdminLoginPage')
            ->middleware(isAdminMiddleware::class)
            ->name('admin.login.page');
        Route::get('dashboard', 'AdminDashboard')
            ->middleware(AdminMiddleware::class)
            ->name('admin.dashboard');

        Route::get('profile', 'AdminProfile')
            ->middleware(AdminMiddleware::class)
            ->name('admin.profile');
        Route::put('profile/update', 'AdminProfileUpdate')
            ->middleware(AdminMiddleware::class)
            ->name('admin.profile.update');

        Route::put('profile/password/update', 'AdminPasswordUpdate')
            ->middleware(AdminMiddleware::class)
            ->name('admin.password.update');

        Route::post('login', 'AdminLogin')->name('admin.login');
        Route::post('logout', 'AdminLogout')->name('admin.logout');
    });
});



require __DIR__ . '/auth.php';
