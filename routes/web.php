<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IBController;
use App\Http\Controllers\IKController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\BursarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProdiController;

// Login dan Logout
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware untuk akses yang memerlukan autentikasi
Route::middleware(['auth.session', 'ensure.student.data', 'role:student'])->group(function () {
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    Route::view('/perkuliahan/kemajuan_studi', 'perkuliahan/kemajuan_studi')->name('kemajuan_studi');
    Route::view('/catatan_perilaku', 'catatanPerilaku/catatan_perilaku')->name('catatan_perilaku');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
    //ib
    Route::get('/perizinan/izin_bermalam', [IBController::class, 'index'])->name('izin_bermalam');
    //ik
    Route::get('/perizinan/izin_keluar', [IKController::class, 'index'])->name('izin_keluar');
    //bursar
    Route::get('bursar/bursar', [BursarController::class, 'index'])->name('bursar');
    //asrama
    Route::get('asrama/asrama', [AsramaController::class, 'index'])->name('asrama');

    //prodi
    Route::get('perkuliahan/prodi', [ProdiController::class, 'index'])->name('prodi');
    //jadwal
    Route::get('perkuliahan/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    //presensi
    Route::get('perkuliahan/absensi', [PresensiController::class, 'index'])->name('absensi');
    Route::get('perkuliahan/{kodeMk}/detail', [PresensiController::class, 'showDetail'])->name('absensi.detail');
});

Route::middleware(['auth.session', 'role:admin'])->group(function () {
    Route::get('/beranda/admin', [adminController::class, 'index'])->name('admin');
    Route::post('/beranda/admin/store', [adminController::class, 'store'])->name('pengumuman.store');
    Route::delete('/beranda/admin/{id}', [adminController::class, 'destroy'])->name('pengumuman.destroy');

    Route::post('/calendar/upload', [CalendarController::class, 'upload'])->name('calendar.upload');
});
