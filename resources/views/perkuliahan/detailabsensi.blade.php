@extends('layouts.app')

@section('content')

<div class="container mt-4">
        <!-- Breadcrumb -->
        <div class="mb-4">
            <h5 class="mb-2 text-start">
                <span class="text-muted">Home</span> / 
                <span class="text-muted">Perkuliahan</span> / 
                <span class="fw-bold">Absensi Mahasiswa</span>
            </h5>
            <!-- Garis Bawah -->
            <hr class="mt-0">
        </div>
        
        <div class="container mt-4">
        <h3 class="mb-4 fw-bold">Detail Absensi: {{ $course['nama'] }}</h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nama Pengajar</th>
                    <th>Lokasi</th>
                    <th>Sesi</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course['presensi'] as $index => $session)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $session['pengajar'] ?? '-' }}</td>
                        <td>{{ $session['lokasi'] }}</td>
                        <td>
                            @if ($session['sesi'] === 'P')
                                <span class="badge bg-success">Praktikum</span>
                            @elseif ($session['sesi'] === 'T')
                                <span class="badge bg-info">Teori</span>
                            @else
                                {{ $session['sesi'] }}
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($session['waktu_mulai'])->translatedFormat('d M Y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($session['waktu_akhir'])->translatedFormat('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection