<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->middleware(['throttle:10,1']) // Limit to 10 requests per minute
    ->name('login');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])
    ->middleware(['throttle:10,1']) // Limit to 10 requests per minute
    ->name('register');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::apiResource('brands', \App\Http\Controllers\BrandController::class);
});