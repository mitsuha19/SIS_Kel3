<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi menggunakan Auth::attempt
        $credentials = $request->only('nim', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Dapatkan user yang sedang login

            session([
                'user' => [
                    'nim' => $user->nim,
                    'name' => $user->username,
                    'role' => $user->role,
                ]
            ]);
            Log::info('Login berhasil untuk user:', ['nim' => $user->nim, 'role' => $user->role]);

            // Flash message sukses login
            $request->session()->flash('success', 'Login berhasil! Selamat datang di Student Information System.');

            try {
                Log::info('Mengirim permintaan API eksternal...');
                $client = new Client(['verify' => false]);

                $response = $client->post('https://cis-dev.del.ac.id/api/jwt-api/do-auth', [
                    'form_params' => [
                        'username' => 'johannes',
                        'password' => 'Del@2022',
                    ],
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'timeout' => 60,
                ]);

                $body = $response->getBody()->getContents();
                Log::info('Respons API diterima (mentah):', ['response_raw' => $body]);

                $data = json_decode($body, true);
                Log::info('Respons API setelah diuraikan:', ['parsed_response' => $data]);

                if ($data && isset($data['result']) && $data['result'] === true) {
                    session(['api_token' => $data['token']]);
                    session(['user_api' => $data['user']]);
                    Log::info('Token API diterima:', ['token' => $data['token']]);

                    if ($user->role === 'admin') {
                        return redirect()->route('admin')->with('success', 'Login sebagai admin berhasil!');
                    } else {
                        return redirect()->route('beranda')->with('success', 'Login berhasil!');
                    }
                }

                Log::error('API login gagal', ['response_parsed' => $data]);
                return back()->withErrors(['login' => 'Gagal mendapatkan token API.']);
            } catch (\Exception $e) {
                Log::error('API Error:', ['message' => $e->getMessage()]);
                return back()->withErrors(['login' => 'Terjadi kesalahan saat menghubungi API.']);
            }
        }

        // Jika autentikasi gagal
        return redirect()->back()->with('error', 'NIM atau password salah');
    }

    public function logout()
    {
        session()->flush(); // Hapus semua data session
        session()->regenerate(); // Regenerate session ID untuk keamanan
        return redirect()->route('login');
    }
}
