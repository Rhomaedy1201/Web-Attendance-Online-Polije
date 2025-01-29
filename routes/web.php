<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TeknisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::get('/login', function () {
    return view('pages.auth.index');
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

    // Ruangan
    Route::get('ruangan', [RuanganController::class, 'index'])->name('master-data.ruangan');
    Route::get('ruangan/create', [RuanganController::class, 'create'])->name('master-data.ruangan.create');
    Route::get('ruangan/edit/{id}', [RuanganController::class, 'edit'])->name('master-data.ruangan.edit');

    // GOlongan
    Route::get('golongan', [GolonganController::class, 'index'])->name('master-data.golongan');
    Route::get('golongan/create', [GolonganController::class, 'create'])->name('master-data.golongan.create');
    Route::get('golongan/edit/{id}', [GolonganController::class, 'edit'])->name('master-data.golongan.edit');

    // Jadwal
    Route::get('jadwal', [JadwalController::class, 'index'])->name('master-data.jadwal');
    Route::get('jadwal/create', [JadwalController::class, 'create'])->name('master-data.jadwal.create');
    Route::get('jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('master-data.jadwal.edit');

    // Teknisi
    Route::get('teknisi', [TeknisiController::class, 'index'])->name('master-data.teknisi');
    Route::get('teknisi/create', [TeknisiController::class, 'create'])->name('master-data.teknisi.create');
    Route::get('teknisi/edit/{id}', [TeknisiController::class, 'edit'])->name('master-data.teknisi.edit');

    // Mahasiswa
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('master-data.mahasiswa');
    Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('master-data.mahasiswa.create');
    Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('master-data.mahasiswa.edit');

});

Route::get('history-presensi', function () {
    return view('pages.history_presensi.index');
})->name('history-presensi');
