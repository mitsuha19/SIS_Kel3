<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

// Login page
Route::get('/', function () {
    return view('auth/login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'nim' => 'required|string',
        'password' => 'required|string',
    ]);

    if ($request->nim === '11416002' && $request->password === 'password') {
        session(['user' => ['nim' => $request->nim, 'name' => 'Nama Pengguna']]);

        $client = new \GuzzleHttp\Client(['verify' => false]);

        try {
            $response = $client->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
                'form_params' => [
                    'username' => 'johannes',
                    'password' => 'Del@2022',
                ],
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'stream' => true, // Stream response data
                'timeout' => 60, // Perpanjang timeout
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if (isset($data['result']) && $data['result'] === true) {
                session(['api_token' => $data['token']]);
                session(['user_api' => $data['user']]);
                Log::info('Token API diterima:', ['token' => $data['token']]);

                return redirect()->route('beranda')->with('success', 'Login berhasil!');
            }

            Log::error('API login gagal', ['response' => $data]);
            return back()->withErrors(['login' => 'Gagal mendapatkan token API.']);
        } catch (\Exception $e) {
            Log::error('API Error', ['message' => $e->getMessage()]);
            return back()->withErrors(['login' => 'Terjadi kesalahan saat menghubungi API.']);
        }
    }

    return back()->withErrors(['login' => 'NIM atau Password salah.']);
})->name('login.submit');

// Logout
Route::get('/logout', function () {
    session()->flush(); // Hapus semua data session
    session()->regenerate(); // Regenerate session ID untuk keamanan
    return redirect()->route('login');
})->name('logout');

// Middleware untuk mengecek token
Route::middleware('auth.session', 'ensure.student.data')->group(function () {
    Route::get('/beranda', function () {
        Log::info('Route /beranda diakses');
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

    // Profil dengan data dari API
    Route::get('/profil', function () {
        $user = session('user');
        $apiToken = session('api_token');

        try {
            // Ambil data mahasiswa menggunakan token API
            $response = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/library-api/get-student-by-nim', [
                    'nim' => $user['nim'],
                ]);

            if ($response->successful()) {
                $responseData = $response->json();

                // Ambil data dari kunci `data` dalam respons
                if (isset($responseData['data'])) {
                    $student = $responseData['data'];
                    return view('profil/profil', compact('student', 'user'));
                }
            }

            Log::error('Profil API error:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data profil.']);
        } catch (\Exception $e) {
            Log::error('API Error:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan saat menghubungi API.']);
        }
    })->name('profil');
});
