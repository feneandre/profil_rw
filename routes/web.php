<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Rw\KontakController as RwKontakController;
use App\Http\Controllers\Rt\KontakController as RtKontakController;
use App\Http\Controllers\Rw\PendidikanRwController;
use App\Http\Controllers\Rt\PendidikanRtController;
use App\Http\Controllers\Kecamatan\PendidikanKecamatanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk Kecamatan
Route::middleware(['auth:kecamatan'])->prefix('kecamatan')->name('kecamatan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('kecamatan.dashboard');
    })->name('dashboard');
    
    Route::get('/kontak', [\App\Http\Controllers\Kecamatan\KontakController::class, 'index'])
         ->name('kontak.index');
    Route::get('/kontak/get-rw/{kelurahan}', [\App\Http\Controllers\Kecamatan\KontakController::class, 'getRw'])
         ->name('kontak.getRw');
    
    // Route Pendidikan
    Route::get('/pendidikan', [PendidikanKecamatanController::class, 'index'])->name('pendidikan.index');
    Route::get('/pendidikan/{id}/{type}', [PendidikanKecamatanController::class, 'show'])->name('pendidikan.show');
    Route::get('/pendidikan/get-rw/{kelurahan}', [PendidikanKecamatanController::class, 'getRw'])->name('pendidikan.getRw');
});

// Rute untuk RW
Route::middleware(['auth:rw'])->prefix('rw')->name('rw.')->group(function () {
    Route::get('/dashboard', function () {
        return view('rw.dashboard');
    })->name('dashboard');
    
    Route::get('/get-rw/{kelurahan}', [RwKontakController::class, 'getRw']);
    Route::resource('kontak', RwKontakController::class);
    Route::resource('pendidikan', PendidikanRwController::class);
    
    // Route untuk Data Pendidikan RT
    Route::get('pendidikan-rt', [PendidikanRwController::class, 'indexRt'])->name('pendidikan-rt.index');
    Route::get('pendidikan-rt/{id}', [PendidikanRwController::class, 'showRt'])->name('pendidikan-rt.show');
});

// Rute untuk RT
Route::middleware(['auth:rt'])->prefix('rt')->name('rt.')->group(function () {
    Route::get('/dashboard', function () {
        return view('rt.dashboard');
    })->name('dashboard');
    
    Route::get('kontak/edit', [RtKontakController::class, 'edit'])->name('kontak.edit');
    Route::put('kontak/update', [RtKontakController::class, 'update'])->name('kontak.update');
    
    Route::resource('kontak', RtKontakController::class)->except(['edit', 'update']);
    Route::resource('pendidikan', PendidikanRtController::class);
});
