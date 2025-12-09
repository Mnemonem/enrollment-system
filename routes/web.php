<?php

use Illuminate\Support\Facades\Route;

// 1. DEFAULT PAGE (Kani ang una mugawas inig load sa system: LOGIN FORM)
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// 2. REGISTRATION PAGE (Mugawas lang ni kung i-click ang Register button)
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// 3. DASHBOARD (Temporary destination human maka-login/register)
Route::get('/dashboard', function () {
    return "<h1>Success! Naa naka sa Dashboard.</h1>";
})->name('dashboard');