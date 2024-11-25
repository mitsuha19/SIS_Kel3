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
                        <canvas id="kemajuanStudiChart" height="400"></canvas>
                    </div>
                </div>

                <!-- Pengumuman -->
                <!-- Pengumuman -->
                <div class="col-md-6">
                    <div class="cards p-3">
                        <h5 class="border-bottom-line text-start">PENGUMUMAN</h5>
                        <ul class="list-unstyled text-start pengumuman">
                            @forelse ($pengumuman as $item)
                                <li>
                                    <strong
                                        class="@switch($item->sumber)
                        @case('BEM') text-primary @break
                        @case('INFO') text-danger @break
                        @case('BURSAR') text-info @break
                        @case('KEASRAMAAN') text-success @break
                        @case('KEMAHASISWAAN') text-purple @break
                        @default text-dark
                    @endswitch">
                                        [{{ strtoupper($item->sumber) }}]
                                    </strong>
                                    {{ $item->judul }}
                                </li>
                            @empty
                                <li class="text-muted">Belum ada pengumuman.</li>
                            @endforelse
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
    @endsection
