<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;

Auth::routes(['verify' => true]);

Route::get('/customer/register', [CustomerRegisterController::class, 'showRegistrationForm'])->name('customer.register');
Route::post('/customer/register', [CustomerRegisterController::class, 'register']);

Route::get('/admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminRegisterController::class, 'register']);

Route::get('/customer/login', [CustomLoginController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomLoginController::class, 'login']);

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});
