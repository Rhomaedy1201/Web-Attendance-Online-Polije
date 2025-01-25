<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::prefix('master-data')->group(function () {
    Route::get('jurusan', function () {
        return view('pages.jurusan.index');
    })->name('master-data.jurusan');

    Route::get('prodi', function () {
        return view('pages.prodi.index');
    })->name('master-data.prodi');

    Route::get('mata-kuliah', function () {
        return view('pages.mata_kuliah.index');
    })->name('master-data.mata_kuliah');

    Route::get('jadwal', function () {
        return view('pages.jadwal.index');
    })->name('master-data.jadwal');

    // Route::get('user', function () {
    //     return view('master-data.user');
    // });
});

// Route::get('history-presensi', function () {
//     return view('history-presensi');
// });
