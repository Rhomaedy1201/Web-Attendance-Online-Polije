<?php

use App\Http\Controllers\Api\AbsensiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JadwalApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::post('/login-mahasiswa', [AuthController::class, 'login'])->name('api.login');
});

// Middleware auth:api digunakan untuk rute yang memerlukan autentikasi token
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

    // Jadwal
    Route::get('jadwal', [JadwalApiController::class, 'index'])->name('jadwal');
    Route::get('jadwal-all-day', [JadwalApiController::class, 'getAllDay'])->name('jadwal.day');
    Route::get('jadwal-now', [JadwalApiController::class, 'getNow'])->name('jadwal.now');

    // Absen
    Route::post('/absen-masuk', [AbsensiController::class, 'masuk'])->name('absen.masuk');
});
