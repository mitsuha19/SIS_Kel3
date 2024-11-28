@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom">
        <h3 class="me-auto">Home / Asrama</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="container mt-4">
        <h3 class="text-center mb-4">Informasi Asrama</h3>
        <hr>

        <!-- Informasi Asrama -->
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <div class="equal-height">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ASRAMA</th>
                                <td>{{ $asramaData['asrama'] ?? 'Tidak Diketahui' }}</td>
                            </tr>
                            <tr>
                                <th>PENGURUS ASRAMA</th>
                                <td>{{ $pembinaAsrama }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <div class="equal-height">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kamar</th>
                                <td>Kamar {{ $asramaData['kamar'] ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Teman Sekamar</th>
                                <td>
                                    @if (!empty($asramaData['teman_sekamar']))
                                        @foreach ($asramaData['teman_sekamar'] as $teman)
                                            - {{ $teman['nama'] ?? '-' }} ({{ $teman['nim'] ?? '-' }}) <br>
                                        @endforeach
                                    @else
                                        <span class="text-muted">Tidak ada teman sekamar.</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
