<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController as ApiAuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\RegisteredUserController as ApiRegisteredUserController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// api version
Route::post('/api/register', [ApiRegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('api-register');

Route::post('/api/login', [ApiAuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('api-login');


Route::post('/api/logout', [ApiAuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('api-logout');
// web
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
