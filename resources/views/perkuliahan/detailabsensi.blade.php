@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Detail Absensi: {{ $course['nama'] }}</h3>
        <table class="table table-bordered">
            <thead>
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
                        <td>{{ $session['sesi'] }}</td>
                        <td>{{ $session['waktu_mulai'] }}</td>
                        <td>{{ $session['waktu_akhir'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
