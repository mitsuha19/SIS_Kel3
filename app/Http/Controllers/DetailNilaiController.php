<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DetailNilaiController extends Controller
{
    public function show($kode_mk)
    {
        $user = session('user');
        $nim = $user['nim'];
        $apiToken = session('api_token');

        $response = Http::withToken($apiToken)
            ->withOptions(['verify' => false])
            ->get('https://cis-dev.del.ac.id/api/library-api/nilai-akhir', [
                'nim' => $nim,
            ]);

        if ($response->successful()) {
            $data = $response->json()['data'] ?? [];

            // Filter data berdasarkan kode mata kuliah
            $matkul = collect($data)->firstWhere('kode_mk', $kode_mk);

            if (!$matkul) {
                return redirect()->route('kemajuan_studi')->with('error', 'Mata Kuliah tidak ditemukan.');
            }

            return view('perkuliahan.detailnilai', compact('matkul'));
        }

        return redirect()->route('kemajuan_studi')->with('error', 'Gagal mengambil data dari API.');
    }
}
