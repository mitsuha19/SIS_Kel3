<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda/home');
})->name('beranda');

Route::get('/bursar', function () {
    return view('bursar/bursar');
})->name('bursar');

Route::get('/Kalender-akademik', function () {
    return view('kalender/kalender');
})->name('kalender');

Route::get('/perkuliahan/jadwal', function () {
    return view('perkuliahan/jadwal');
})->name('jadwal');

Route::get('/perkuliahan/kemajuan_studi', function () {
    return view('perkuliahan/kemajuan_studi');
})->name('kemajuan_studi');

Route::get('/perkuliahan/prodi', function () {
    return view('perkuliahan/prodi');
})->name('prodi');

Route::get('/perizinan/izin_bermalam', function () {
    return view('perizinan/izin_bermalam');
})->name('izin_bermalam');

Route::get('/perizinan/izin_keluar', function () {
    return view('perizinan/izin_keluar');
})->name('izin_keluar');

Route::get('/asrama', function () {
    return view('asrama/asrama');
})->name('asrama');

Route::get('/catatan_perilaku', function () {
    return view('catatanPerilaku/catatan_perilaku');
})->name('catatan_perilaku');
