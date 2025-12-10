<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/users/{name?}', function ($name=null){
//     return 'Ohayo gozaimasu '. $name;
// });