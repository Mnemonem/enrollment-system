<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// --- GUEST ROUTES (For users NOT logged in) ---
Route::middleware('guest')->group(function () {

    // 1. LOGIN PAGE (We put this at the Root URL '/')
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // 2. REGISTER PAGE (We MUST use a different URL, e.g., '/register')
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// --- AUTH ROUTES (For users who ARE logged in) ---
Route::middleware('auth')->group(function () {

    // 3. DASHBOARD
    // You must use Route::get here. You cannot just "return view" directly in the group.
    Route::get('/dashboard', function () {
        return view('welcome'); // Or view('dashboard.dashboard')
    })->name('dashboard');

    // 4. LOGOUT
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});