<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CatatanPerilakuController extends Controller
{
    public function index()
    {
        $user = session('user');
        $nim = $user['nim'];
        $apiToken = session('api_token');

        try {
            // Ambil data nilai perilaku
            $response = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/library-api/get-penilaian', [
                    'nim' => $nim,
                ]);

            // Ambil data pelanggaran
            $pelanggaranResponse = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/aktivitas-mhs-api/get-pelanggaran-mhs', [
                    'nim' => $nim,
                ]);

            Log::info('Raw Pelanggaran Response:', ['response' => $pelanggaranResponse->body()]);

            if ($response->successful() && $pelanggaranResponse->successful()) {
                $data = $response->json();
                $pelanggaranData = $pelanggaranResponse->json();

                // Data nilai perilaku
                $nilaiPerilaku = $data['Nilai Perilaku'] ?? [];
                $nilaiPerilaku = array_values($nilaiPerilaku);

                // Data pelanggaran
                $pelanggaranList = $pelanggaranData['data'] ?? [];
                Log::info('Pelanggaran List', ['list' => $pelanggaranList]);

                // Tambahkan pelanggaran ke masing-masing nilai perilaku
                foreach ($nilaiPerilaku as &$perilaku) {
                    $perilaku['semester'] = $this->convertSemester($perilaku['sem_ta']);
                    $filteredPelanggaran = array_filter($pelanggaranList, function ($pelanggaran) use ($perilaku) {
                        return (int)$pelanggaran['ta'] === (int)$perilaku['ta'] && (int)$pelanggaran['sem_ta'] === (int)$perilaku['sem_ta'];
                    });
                    $perilaku['pelanggaran'] = array_values($filteredPelanggaran);

                    Log::info('Filtered Pelanggaran for TA and SEM_TA', [
                        'ta' => $perilaku['ta'],
                        'sem_ta' => $perilaku['sem_ta'],
                        'filtered_pelanggaran' => $perilaku['pelanggaran']
                    ]);
                }

                return view('catatanPerilaku.catatan_perilaku', compact('nilaiPerilaku'));
            }

            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data dari API.']);
        } catch (\Exception $e) {
            Log::error('Exception terjadi:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    private function convertSemester($sem_ta)
    {
        switch ($sem_ta) {
            case 1:
                return 'Gasal';
            case 2:
                return 'Genap';
            case 3:
                return 'Pendek';
            default:
                return 'Tidak Diketahui';
        }
    }
}
