<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// // 1. DEFAULT PAGE (Kani ang una mugawas inig load sa system: LOGIN FORM)
// Route::get('/', function () {
//     return view('auth.login');
// })->name('login');

// // 2. REGISTRATION PAGE (Mugawas lang ni kung i-click ang Register button)
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

// // 3. DASHBOARD (Temporary destination human maka-login/register)
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// })->name('dashboard');


Route::middleware('guest')->group(function () {
    //LOGIN ROUTES
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    //REGISTER ROUTES
    Route::get('/', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

});

Route::middleware('')->group(function () {
    return view('welcome');
})->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

