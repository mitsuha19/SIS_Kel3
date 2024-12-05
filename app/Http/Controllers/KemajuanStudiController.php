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

            $response2 = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/library-api/nilai-akhir', [
                    'nim' => $nim,
                ]);

            if ($response->successful() && $response2->successful()) {
                $data = $response->json();
                $data2 = $response2->json();
                $ipSemester = $data['IP Semester'] ?? [];

                // Urutkan data berdasarkan tahun akademik (ta) dan semester (sem)
                uasort($ipSemester, function ($a, $b) {
                    if ($a['ta'] === $b['ta']) {
                        return $a['sem'] <=> $b['sem'];
                    }
                    return $a['ta'] <=> $b['ta'];
                });

                // Ambil tahun akademik yang paling awal (ta terkecil)
                $firstTa = min(array_map(function ($item) {
                    return $item['ta'];
                }, $ipSemester));

                // Buat array semester berdasarkan urutan TA
                $semesterData = [];
                $semesterCounter = 1; // Mulai dari semester 1

                foreach ($ipSemester as $semester => $details) {
                    $semesterData[] = [
                        'semester' => $semesterCounter++, // Menghitung urutan semester
                        'ta' => $details['ta'],
                        'sem' => $details['sem'],
                        'ip_semester' => $details['ip_semester']
                    ];
                }

                // Siapkan labels dan values untuk chart berdasarkan data semester yang ada
                $labels = [];
                $values = [];

                $semesterCounter = 1; // Mulai dari semester 1 secara default

                foreach ($semesterData as $semester) {
                    // Tentukan urutan semester sesuai dengan data yang ada
                    $semesterLabel = "Semester " . ($semester['sem'] + ($semester['ta'] - $firstTa) * 2);  // Menentukan urutan semester berdasarkan sem dan ta

                    $labels[] = "{$semesterLabel} (TA {$semester['ta']})"; // Menggunakan nama semester yang sesuai
                    $values[] = is_numeric($semester['ip_semester']) ? (float) $semester['ip_semester'] : 0;
                }

                // Memproses mata kuliah per semester
                $matkulPerSemester = [];
                $semesterOrder = []; // Menyimpan urutan semester dari mata kuliah

                foreach ($data2['data'] as $matkul) {
                    // Menghitung semester berdasarkan TA terkecil
                    $semesterKey = "Semester " . (($matkul['ta'] - $firstTa) * 2 + $matkul['sem_ta']);

                    if (!isset($matkulPerSemester[$semesterKey])) {
                        $matkulPerSemester[$semesterKey] = [];
                    }
                    $matkulPerSemester[$semesterKey][] = $matkul;

                    // Menyimpan urutan semester berdasarkan data mata kuliah
                    if (!in_array($semesterKey, $semesterOrder)) {
                        $semesterOrder[] = $semesterKey;
                    }
                }

                // Mengurutkan semester berdasarkan urutan yang ditemukan pada data mata kuliah
                $sortedSemesterData = [];
                foreach ($semesterOrder as $semesterKey) {
                    $semesterData = $matkulPerSemester[$semesterKey];
                    $sortedSemesterData[] = [
                        'semester' => $semesterKey,
                        'ta' => $semesterData[0]['ta'],
                        'sem' => $semesterData[0]['sem_ta'],
                        'ip_semester' => $semesterData[0]['ip_semester'] ?? 'Belum di-generate',
                    ];
                }

                return view('perkuliahan.kemajuan_studi', compact('labels', 'values', 'data', 'data2', 'matkulPerSemester', 'sortedSemesterData'));
            }

            Log::error('Gagal mengambil data kemajuan studi:', ['response' => $response->body()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data kemajuan studi.']);
        } catch (\Exception $e) {
            Log::error('Kesalahan API kemajuan studi:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan saat memuat data kemajuan studi.']);
        }
    }
}
