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

    <!-- Judul Halaman -->
    <h3 class="fw-bold border-bottom pb-2">Absensi Mahasiswa</h3>

    <!-- Tabel -->
    <div class="mt-5">
        <table class="table table-hover table-bordered align-middle" style="width: 80%; margin: 0 auto;">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Kode Matakuliah</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Persentase Kehadiran (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $index => $attendance)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $attendance['kode_mk'] }}</td>
                        <td>
                            <a href="{{ route('absensi.detail', $attendance['kode_mk']) }}" class="text-decoration-none text-primary">
                                {{ $attendance['nama_mk'] }}
                            </a>
                        </td>
                        <td>{{ $attendance['sks'] }}</td>
                        <td>{{ number_format($attendance['attendance_percentage'], 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
