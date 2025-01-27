<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::prefix('master-data')->group(function () {
    // Jurusan
    Route::get('jurusan', [JurusanController::class, 'index'])->name('master-data.jurusan');
    Route::get('jurusan/create', [JurusanController::class, 'create'])->name('master-data.jurusan.create');
    Route::get('jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('master-data.jurusan.edit');

    // Prodi
    Route::get('prodi', [ProdiController::class, 'index'])->name('master-data.prodi');
    Route::get('prodi/create', [ProdiController::class, 'create'])->name('master-data.prodi.create');
    Route::get('prodi/edit/{id}', [ProdiController::class, 'edit'])->name('master-data.prodi.edit');

    // Prodi
    Route::get('dosen', [DosenController::class, 'index'])->name('master-data.dosen');
    Route::get('dosen/create', [DosenController::class, 'create'])->name('master-data.dosen.create');
    Route::get('dosen/edit/{id}', [DosenController::class, 'edit'])->name('master-data.dosen.edit');
    
    // Matkul
    Route::get('matkul', [MatkulController::class, 'index'])->name('master-data.matkul');
    Route::get('matkul/create', [MatkulController::class, 'create'])->name('master-data.matkul.create');
    Route::get('matkul/edit/{id}', [MatkulController::class, 'edit'])->name('master-data.matkul.edit');

    // Matkul
    Route::get('jadwal', [JadwalController::class, 'index'])->name('master-data.jadwal');
    Route::get('jadwal/create', [JadwalController::class, 'create'])->name('master-data.jadwal.create');
    Route::get('jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('master-data.jadwal.edit');

    Route::get('user', function () {
        return view('pages.user.index');
    })->name('master-data.user');
});

Route::get('history-presensi', function () {
    return view('pages.history_presensi.index');
})->name('history-presensi');
