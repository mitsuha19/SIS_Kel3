<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class PresensiController extends Controller
{
    public function index()
    {
        $user = session('user');
        $nim = $user['nim'] ?? null;
        $apiToken = session('api_token');

        if (!$nim) {
            return redirect()->route('login')->withErrors(['error' => 'NIM tidak ditemukan.']);
        }

        try {
            $response = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/aktivitas-mhs-api/get-presensi-by-nim', [
                    'nim' => $nim,
                ]);

            if ($response->successful()) {
                $data = $response->json()['data'] ?? [];

                // Proses data untuk menghitung persentase kehadiran
                $attendances = [];
                foreach ($data as $course) {
                    $totalSessions = count($course['presensi']);
                    $attendedSessions = count(array_filter($course['presensi'], function ($session) {
                        return $session['status_kehadiran'] == 4; // Status hadir
                    }));

                    $attendancePercentage = $totalSessions > 0 ? round(($attendedSessions / $totalSessions) * 100, 2) : 0;

                    $attendances[] = [
                        'kode_mk' => $course['kode_mk'],
                        'nama_mk' => $course['nama'],
                        'sks' => $course['sks'] ?? 0,
                        'total_sessions' => $totalSessions,
                        'attended_sessions' => $attendedSessions,
                        'attendance_percentage' => $attendancePercentage,
                        'presensi' => $course['presensi'],
                    ];
                }

                return view('perkuliahan.absensi', compact('attendances'));
            }

            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data absensi.']);
        } catch (\Exception $e) {
            Log::error('Kesalahan API:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan saat mengambil data.']);
        }
    }

    public function showDetail($kodeMk)
    {
        $user = session('user');
        $nim = $user['nim'] ?? null;
        $apiToken = session('api_token');

        if (!$nim) {
            return redirect()->route('login')->withErrors(['error' => 'NIM tidak ditemukan.']);
        }

        try {
            $response = Http::withToken($apiToken)
                ->withOptions(['verify' => false])
                ->get('https://cis-dev.del.ac.id/api/aktivitas-mhs-api/get-presensi-by-nim', [
                    'nim' => $nim,
                ]);

            if ($response->successful()) {
                $data = $response->json()['data'] ?? [];
                $course = collect($data)->firstWhere('kode_mk', $kodeMk);

                if (!$course) {
                    return redirect()->route('absensi')->withErrors(['error' => 'Data tidak ditemukan.']);
                }

                return view('perkuliahan.detailabsensi', compact('course'));
            }

            return redirect()->route('beranda')->withErrors(['error' => 'Gagal mengambil data absensi.']);
        } catch (\Exception $e) {
            Log::error('Kesalahan API:', ['message' => $e->getMessage()]);
            return redirect()->route('beranda')->withErrors(['error' => 'Terjadi kesalahan saat mengambil data.']);
        }
    }
}
