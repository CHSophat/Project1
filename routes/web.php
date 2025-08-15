<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DepartmentController;

Route::resource('departments', DepartmentController::class)->middleware('auth');

use App\Http\Controllers\EmployeeController;

Route::resource('employees', EmployeeController::class)->middleware('auth');

use App\Http\Controllers\AttendanceController;

Route::resource('attendance', AttendanceController::class)->middleware('auth');

use App\Http\Controllers\PayrollController;

Route::resource('payroll', PayrollController::class)->middleware('auth');

use App\Http\Controllers\PerformanceReviewController;

Route::resource('reviews', PerformanceReviewController::class)->middleware('auth');

use App\Http\Controllers\AssetController;

Route::resource('assets', AssetController::class)->middleware('auth');

use App\Http\Controllers\BenefitController;

Route::resource('benefits', BenefitController::class)->middleware('auth');


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// Only guests (not logged-in users) can access registration routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route now uses DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
