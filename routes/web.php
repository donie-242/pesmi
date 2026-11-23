<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminRegistrationController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::put('/password', [ProfileController::class, 'updatePassword'])
    ->name('password.update');
    // Pendaftaran
    Route::get('/pendaftaran', [RegistrationController::class, 'create'])
        ->name('pendaftaran.create');

    Route::post('/pendaftaran', [RegistrationController::class, 'store'])
        ->name('pendaftaran.store');

    Route::post('/pendaftaran/kirim', [RegistrationController::class, 'submit'])
        ->name('pendaftaran.submit');

    Route::get('/pendaftaran/detail', [RegistrationController::class, 'show'])
        ->name('pendaftaran.show');
    Route::delete('/profile/photo', [ProfileController::class, 'removePhoto'])
    ->name('profile.photo.remove');
 
    // Admin Dashboard
    Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/admin/pendaftaran', [AdminRegistrationController::class, 'index'])
    ->name('admin.registrations.index');
    Route::patch(
    '/admin/pendaftaran/{registration}/status',
    [AdminRegistrationController::class, 'updateStatus']
)->name('admin.registrations.update-status');
    Route::get('/admin/pendaftaran/{registration}', [AdminRegistrationController::class, 'show'])
    ->name('admin.registrations.show');
});
require __DIR__.'/auth.php';

    
   // Profile
Route::get('/profile', [ProfileController::class, 'edit'])
    ->name('profile.edit');

Route::patch('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::delete('/profile', [ProfileController::class, 'destroy'])
    ->name('profile.destroy');

Route::put('/password', [ProfileController::class, 'updatePassword'])
    ->name('password.update');});

require __DIR__.'/auth.php';