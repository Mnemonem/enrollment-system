<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

    // 1. LOGIN PAGE (
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // 2. REGISTER PAGE 
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// --- AUTH ROUTES (For users who ARE logged in) ---
Route::middleware('auth')->group(function () {

    // 3. DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard'); //student dashboard view// ayaw kalimot nga under sa view kay another folder for dashboard
    })->name('dashboard');

    // 4. LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});