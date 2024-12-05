<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetailNilaiController extends Controller
{
    public function show($kode_mk)
    {

        $user = session('user');
        $nim = $user['nim'];
        $apiToken = session('api_token');

        $response = Http::withToken($apiToken)
            ->withOptions(['verify' => false])
            ->get('https://cis-dev.del.ac.id/api/library-api/get-penilaian', [
                'nim' => $nim,
            ]);

        if ($response->successful()) {
            // Ambil data dari response
            $data = $response->json()['data'];

            // Filter data berdasarkan kode mata kuliah
            $matkul = collect($data)->firstWhere('kode_mk', $kode_mk);

            if (!$matkul) {
                return redirect()->route('kemajuan_studi')->with('error', 'Mata Kuliah tidak ditemukan.');
            }

            return view('detail-nilai', compact('matkul'));
        } else {
            return redirect()->route('kemajuan_studi')->with('error', 'Gagal mengambil data dari API.');
        }
    }
}
