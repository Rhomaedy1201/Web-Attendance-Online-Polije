<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::middleware(['guest', 'web'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.action');
});

Route::middleware(['auth','web'])->group(function () {
    
    Route::get('/', function () {
        return view('pages.dashboard.index');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('master-data')->group(function () {
        // Jurusan
        Route::get('jurusan', [JurusanController::class, 'index'])->name('master-data.jurusan');
        Route::post('jurusan', [JurusanController::class, 'store'])->name('master-data.jurusan.store');
        Route::get('jurusan/create', [JurusanController::class, 'create'])->name('master-data.jurusan.create');
        Route::get('jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('master-data.jurusan.edit');
        Route::put('jurusan/update/{id}', [JurusanController::class, 'update'])->name('master-data.jurusan.update');
        Route::post('jurusan/delete', [JurusanController::class, 'destroy'])->name('master-data.jurusan.delete');
    
        // Prodi
        Route::get('prodi', [ProdiController::class, 'index'])->name('master-data.prodi');
        Route::post('prodi', [ProdiController::class, 'store'])->name('master-data.prodi.store');
        Route::get('prodi/create', [ProdiController::class, 'create'])->name('master-data.prodi.create');
        Route::get('prodi/edit/{id}', [ProdiController::class, 'edit'])->name('master-data.prodi.edit');
        Route::put('prodi/update/{id}', [ProdiController::class, 'update'])->name('master-data.prodi.update');
        Route::post('prodi/delete', [ProdiController::class, 'destroy'])->name('master-data.prodi.delete');
    
        // Prodi
        Route::get('dosen', [DosenController::class, 'index'])->name('master-data.dosen');
        Route::post('dosen', [DosenController::class, 'store'])->name('master-data.dosen.store');
        Route::get('dosen/create', [DosenController::class, 'create'])->name('master-data.dosen.create');
        Route::get('dosen/edit/{id}', [DosenController::class, 'edit'])->name('master-data.dosen.edit');
        Route::put('dosen/update/{id}', [DosenController::class, 'update'])->name('master-data.dosen.update');
        Route::post('dosen/delete', [DosenController::class, 'destroy'])->name('master-data.dosen.delete');
        
        // Matkul
        Route::get('matkul', [MatkulController::class, 'index'])->name('master-data.matkul');
        Route::post('matkul', [MatkulController::class, 'store'])->name('master-data.matkul.store');
        Route::get('matkul/create', [MatkulController::class, 'create'])->name('master-data.matkul.create');
        Route::get('matkul/edit/{id}', [MatkulController::class, 'edit'])->name('master-data.matkul.edit');
        Route::put('matkul/update/{id}', [MatkulController::class, 'update'])->name('master-data.matkul.update');
        Route::post('matkul/delete', [MatkulController::class, 'destroy'])->name('master-data.matkul.delete');
    
        // Ruangan
        Route::get('ruangan', [RuanganController::class, 'index'])->name('master-data.ruangan');
        Route::post('ruangan', [RuanganController::class, 'store'])->name('master-data.ruangan.store');
        Route::get('ruangan/create', [RuanganController::class, 'create'])->name('master-data.ruangan.create');
        Route::get('ruangan/edit/{id}', [RuanganController::class, 'edit'])->name('master-data.ruangan.edit');
        Route::put('ruangan/update/{id}', [RuanganController::class, 'update'])->name('master-data.ruangan.update');
        Route::post('ruangan/delete', [RuanganController::class, 'destroy'])->name('master-data.ruangan.delete');
    
        // GOlongan
        Route::get('golongan', [GolonganController::class, 'index'])->name('master-data.golongan');
        Route::post('golongan', [GolonganController::class, 'store'])->name('master-data.golongan.store');
        Route::get('golongan/create', [GolonganController::class, 'create'])->name('master-data.golongan.create');
        Route::get('golongan/edit/{golongan}', [GolonganController::class, 'edit'])->name('master-data.golongan.edit');
        Route::put('golongan/update/{golongan}', [GolonganController::class, 'update'])->name('master-data.golongan.update');
        Route::post('golongan/delete', [GolonganController::class, 'destroy'])->name('master-data.golongan.delete');
    
        // Jadwal
        Route::get('jadwal', [JadwalController::class, 'index'])->name('master-data.jadwal');
        Route::post('jadwal', [JadwalController::class, 'store'])->name('master-data.jadwal.store');
        Route::get('jadwal/create', [JadwalController::class, 'create'])->name('master-data.jadwal.create');
        Route::get('jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('master-data.jadwal.edit');
    
        // Teknisi
        Route::get('teknisi', [TeknisiController::class, 'index'])->name('master-data.teknisi');
        Route::post('teknisi', [TeknisiController::class, 'store'])->name('master-data.teknisi.store');
        Route::get('teknisi/create', [TeknisiController::class, 'create'])->name('master-data.teknisi.create');
        Route::get('teknisi/edit/{id}', [TeknisiController::class, 'edit'])->name('master-data.teknisi.edit');
        Route::put('teknisi/update/{id}', [TeknisiController::class, 'update'])->name('master-data.teknisi.update');
        Route::post('teknisi/delete', [TeknisiController::class, 'destroy'])->name('master-data.teknisi.delete');
        Route::post('teknisi/reset', [TeknisiController::class, 'resetPassword'])->name('master-data.teknisi.reset');
    
        // Mahasiswa
        Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('master-data.mahasiswa');
        Route::post('mahasiswa', [MahasiswaController::class, 'store'])->name('master-data.mahasiswa.store');
        Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('master-data.mahasiswa.create');
        Route::get('mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('master-data.mahasiswa.edit');
        Route::put('mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('master-data.mahasiswa.update');
        Route::post('mahasiswa/delete', [MahasiswaController::class, 'destroy'])->name('master-data.mahasiswa.delete');
    
    });
    
    Route::get('history-presensi', function () {
        return view('pages.history_presensi.index');
    })->name('history-presensi');
    
});