<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function show()
    {
        $token = session('token'); // Ambil token dari session
        if (!$token) {
            return redirect()->route('login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        // Kirim permintaan GET untuk mengambil data berdasarkan NIM
        $response = Http::withToken($token)->get('https://cis-dev.del.ac.id/api/library-api/get-student-by-nim', [
            'nim' => '11416002',
        ]);

        if ($response->successful()) {
            $studentData = $response->json();

            return view('profil', ['student' => $studentData]);
        }

        return redirect()->route('profil')->withErrors(['error' => 'Gagal mengambil data dari API.']);
    }
}
