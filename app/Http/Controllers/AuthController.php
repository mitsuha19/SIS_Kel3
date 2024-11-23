<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Kirim permintaan login ke API
        $response = Http::asForm()->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
            'username' => 'johannes',
            'password' => 'Del@2022',
        ]);

        if ($response->successful()) {
            $data = $response->json();

            session(['token' => $data['token']]);

            return redirect()->route('profil');
        }

        // Jika gagal
        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    public function logout()
    {
        session()->forget('token');
        return redirect()->route('login');
    }
}
