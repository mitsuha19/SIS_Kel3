@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
        <h3 class="me-auto">Home / Perkuliahan / Absensi Mahasiswa</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="container mt-4">
        <h3 class="mb-4">Daftar Absensi</h3>
        <table class="table table-bordered">
            <thead>
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
                            <a href="{{ route('absensi.detail', $attendance['kode_mk']) }}" class="text-primary">
                                {{ $attendance['nama_mk'] }}
                            </a>
                        </td>
                        <td>{{ $attendance['sks'] }}</td>
                        <td>{{ $attendance['attendance_percentage'] }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
