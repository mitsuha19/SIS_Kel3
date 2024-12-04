<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KemajuanStudiController extends Controller
{
    public function index()
    {
        $user = session('user');
        $nim = $user['nim'];
        $apiToken = session('api_token');

        try {
            $response = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/library-api/get-penilaian', [
                    'nim' => $nim,
                ]);

            Log::info('Respons API kemajuan studi:', ['body' => $response->body()]);

            if ($response->successful()) {
                $data = $response->json();
                $ipSemester = $data['IP Semester'] ?? [];

                // Urutkan data berdasarkan tahun akademik (ta) dan semester (sem)
                uasort($ipSemester, function ($a, $b) {
                    if ($a['ta'] === $b['ta']) {
                        return $a['sem'] <=> $b['sem'];
                    }
                    return $a['ta'] <=> $b['ta'];
                });

                $labels = [];
                $values = [];

                foreach ($ipSemester as $semester => $details) {
                    $labels[] = "TA {$details['ta']} - Semester {$details['sem']}";
                    $values[] = is_numeric($details['ip_semester']) ? (float) $details['ip_semester'] : 0;
                }

                Log::info('Labels:', $labels);
                Log::info('Values:', $values);

                return view('perkuliahan.kemajuan_studi', compact('labels', 'values', 'data'));
            }

            Log::error('Gagal mengambil data kemajuan studi:', ['response' => $response->body()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data kemajuan studi.']);
        } catch (\Exception $e) {
            Log::error('Kesalahan API kemajuan studi:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan saat memuat data kemajuan studi.']);
        }
    }
}
