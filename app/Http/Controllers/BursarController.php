<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class BursarController extends Controller
{
    public function index(Request $request)
    {
        $user = session('user'); // Mendapatkan data user dari session
        $nim = $user['nim'] ?? null; // NIM user saat login
        $apiToken = session('api_token'); // Token API dari session

        if (!$nim) {
            Log::error('NIM tidak ditemukan dalam session.');
            return redirect()->route('beranda')->withErrors(['error' => 'NIM tidak ditemukan.']);
        }

        Log::info('NIM fetched from session', ['nim' => $nim]);

        try {
            $response = Http::withToken($apiToken)
                ->withOptions(['verify' => false]) // Abaikan verifikasi SSL
                ->get('https://cis-dev.del.ac.id/api/aktivitas-mhs-api/get-bursar-mhs', [
                    'nim' => $nim,
                    'tahun' => '',
                    'bulan' => '',
                ]);

            $response2 = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/aktivitas-mhs-api/get-virtual-account', [
                    'nim' => $nim,
                ]);

            Log::info('API Response', ['status' => $response->status(), 'body' => $response->body()]);

            if ($response->successful() && $response2->successful()) {
                $data = $response->json();
                $bursarData = $data['data'] ?? [];

                $data2 = $response2->json();
                $VAData = $data2['data'] ?? [];

                // Pagination manual
                $perPage = 10;
                $currentPage = $request->input('page', 1); // Ambil halaman saat ini dari input
                $offset = ($currentPage - 1) * $perPage;

                // Balikkan urutan data dan ambil halaman yang diminta
                $reversedData = array_reverse($bursarData);
                $paginatedData = array_slice($reversedData, $offset, $perPage);
                $total = count($bursarData);

                return view('bursar.bursar', [
                    'bursarData' => $paginatedData,
                    'total' => $total,
                    'currentPage' => $currentPage,
                    'perPage' => $perPage,
                    'VAData' => $VAData,
                ]);
            }

            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data bursar dari API.']);
        } catch (\Exception $e) {
            Log::error('Kesalahan API:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
