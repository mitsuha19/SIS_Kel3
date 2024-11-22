<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('auth/login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'nim' => 'required|string',
        'password' => 'required|string',
    ]);

    if ($request->nim === '12345' && $request->password === 'password') {
        session(['user' => $request->nim]);
        return redirect()->route('beranda');
    }

    return back()->withErrors(['login' => 'NIM atau Password salah.']);
})->name('login.submit');

Route::get('/logout', function () {
    session()->flush();
    return redirect()->route('login');
})->name('logout');

Route::middleware('auth.session')->group(function () {
    Route::get('/beranda', function () {
        return view('beranda/home');
    })->name('beranda');

    Route::get('/bursar', function () {
        return view('bursar/bursar');
    })->name('bursar');

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

    Route::get('/profil', function () {
        return view('profil/profil');
    })->name('profil');
});
