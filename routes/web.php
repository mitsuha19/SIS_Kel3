<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfilController;

// Login dan Logout
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk akses yang memerlukan autentikasi
Route::middleware(['auth.session', 'ensure.student.data', 'role:student'])->group(function () {
    Route::view('/beranda', 'beranda/home')->name('beranda');
    Route::view('/bursar', 'bursar/bursar')->name('bursar');
    Route::view('/perkuliahan/jadwal', 'perkuliahan/jadwal')->name('jadwal');
    Route::view('/perkuliahan/kemajuan_studi', 'perkuliahan/kemajuan_studi')->name('kemajuan_studi');
    Route::view('/perkuliahan/prodi', 'perkuliahan/prodi')->name('prodi');
    Route::view('/perizinan/izin_bermalam', 'perizinan/izin_bermalam')->name('izin_bermalam');
    Route::view('/perizinan/izin_keluar', 'perizinan/izin_keluar')->name('izin_keluar');
    Route::view('/asrama', 'asrama/asrama')->name('asrama');
    Route::view('/catatan_perilaku', 'catatanPerilaku/catatan_perilaku')->name('catatan_perilaku');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
});

Route::middleware(['auth.session', 'role:admin'])->group(function () {
    Route::get('/beranda/admin', [adminController::class, 'index'])->name('admin');
});
