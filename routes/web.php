<?php

use App\Http\Controllers\JurusanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::prefix('master-data')->group(function () {
    Route::get('jurusan', [JurusanController::class, 'index'])->name('master-data.jurusan');
    Route::get('jurusan/create', [JurusanController::class, 'create'])->name('master-data.jurusan.create');
    Route::get('jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('master-data.jurusan.edit');

    Route::get('prodi', function () {
        return view('pages.prodi.index');
    })->name('master-data.prodi');

    Route::get('mata-kuliah', function () {
        return view('pages.mata_kuliah.index');
    })->name('master-data.mata_kuliah');

    Route::get('jadwal', function () {
        return view('pages.jadwal.index');
    })->name('master-data.jadwal');

    Route::get('user', function () {
        return view('pages.user.index');
    })->name('master-data.user');
});

Route::get('history-presensi', function () {
    return view('pages.history_presensi.index');
})->name('history-presensi');
