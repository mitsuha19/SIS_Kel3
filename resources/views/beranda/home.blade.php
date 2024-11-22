@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
        <h3 class="me-auto">Home</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="app-content-header">
        <div class="container-fluid">
            <!-- Waktu di bagian atas -->
            <div class="d-flex justify-content-start align-items-center">
                <p class="text-muted mb-3">{{ now()->addHours(7)->isoFormat('dddd, D MMMM YYYY HH:mm') }}</p>
            </div>

            <!-- Kontainer untuk Komponen -->
            <div class="row">
                <!-- Grafik Kemajuan Studi -->
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h5 class="card-title">Kemajuan Studi</h5>
                        <canvas id="kemajuanStudiChart" height="200"></canvas>
                    </div>
                </div>

                <!-- Pengumuman -->
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h5 class="card-title">Pengumuman</h5>
                        <ul class="list-unstyled">
                            <li><strong>[KEMAHASISWAAN]</strong> Ketentuan dan Prosedur Pembayaran Bursar Mahasiswa</li>
                            <li><strong>[INFO]</strong> Ret-Reat 2022 Gelombang Ke-2</li>
                            <li><strong>[INFO]</strong> Ret-Reat 2022 Gelombang Ke-1</li>
                            <li><strong>[BURSAR]</strong> Pembayaran Bursar Mahasiswa Oktober 2024</li>
                            <li><strong>[BEM]</strong> Kegiatan Mahasiswa Festival Seni Budaya 2024</li>
                            <!-- Tambahkan pengumuman lainnya -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tombol Unduh Kalender -->
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary me-2">Unduh Kalender Akademik!</button>
                    <button class="btn btn-primary">Unduh Kalender BEM!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
