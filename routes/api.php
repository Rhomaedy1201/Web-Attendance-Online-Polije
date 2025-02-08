<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::post('/login-mahasiswa', [AuthController::class, 'login'])->name('api.login');
});

// Middleware auth:api digunakan untuk rute yang memerlukan autentikasi token
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});
