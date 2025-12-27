<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodController;


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

    //4. MOOD ENTRY TAB
    // Route::get('/mood-entry', function (){
    //     return view('activity.moodentry');
    // })->name('mood.entry');
    Route::get('/mood-entry', [MoodController::class,'entry'])->name('mood.entry');

    // 5. MOOD HISTORY TAB
    // Route::get('/mood-history', function(){ 
    //     return view('activity.moodhistory');
    // })->name('mood.history'); //dili makalimot sa name diri
    Route::get('/mood-history', [MoodController::class,'history'])->name('mood.history');
    //6. CREATION OF ENTRY
    // SHOW THE "New Entry" Page (GET)
    Route::get('/mood/create', [MoodController::class, 'create'])->name('mood.create');

    // B. Save sa Database (POST) 
    Route::post('/mood/store', [MoodController::class, 'store'])->name('mood.store');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Mood History
    // Route::get('/mood')
});