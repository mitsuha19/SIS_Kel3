@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <!-- Judul Halaman -->
        <div class="d-flex align-items-center mb-4 border-bottom">
            <h3 class="me-auto">
                <a href="{{ route('beranda') }}">Home</a> /
                <a href="#">Perkuliahan</a> /
                <a href="{{ route('kemajuan_studi') }}">Kemajuan Studi</a> /
                <a href="#">Detail Nilai</a>
            </h3>
        </div>

        <!-- Informasi Mata Kuliah -->
        <h3 class="mb-3 underline-bold">Detail Mata Kuliah</h3>
        <div class="card p-3 shadow-sm mb-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <td>{{ $matkul['kode_mk'] }}</td>
                    </tr>
                    <tr>
                        <th>Nama Mata Kuliah</th>
                        <td>{{ $matkul['nama_kul_ind'] }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Akademik</th>
                        <td>{{ $matkul['ta'] }}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>{{ $penilaian['sem'] }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Akhir</th>
                        <td>{{ $matkul['na'] }}</td>
                    </tr>
                    <tr>
                        <th>Grade</th>
                        <td>{{ $matkul['nilai'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs" id="nilaiTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tugas-tab" data-bs-toggle="tab" data-bs-target="#tugas" type="button"
                    role="tab" aria-controls="tugas" aria-selected="true">Tugas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="kuis-tab" data-bs-toggle="tab" data-bs-target="#kuis" type="button"
                    role="tab" aria-controls="kuis" aria-selected="false">Kuis</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="uts-tab" data-bs-toggle="tab" data-bs-target="#uts" type="button"
                    role="tab" aria-controls="uts" aria-selected="false">UTS</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="uas-tab" data-bs-toggle="tab" data-bs-target="#uas" type="button"
                    role="tab" aria-controls="uas" aria-selected="false">UAS</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tambahan-tab" data-bs-toggle="tab" data-bs-target="#tambahan" type="button"
                    role="tab" aria-controls="tambahan" aria-selected="false">Nilai Tambahan</button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
                <p><strong>{{ $detailNilai['nama_tugas'] ?? 'Tugas' }}</strong>:
                    {{ $detailNilai['nilai_tugas'] ?? 'Belum Ada Nilai' }}</p>
            </div>
            <div class="tab-pane fade" id="kuis" role="tabpanel" aria-labelledby="kuis-tab">
                <p><strong>{{ $detailNilai['nama_kuis'] ?? 'Kuis' }}</strong>:
                    {{ $detailNilai['nilai_kuis'] ?? 'Belum Ada Nilai' }}</p>
            </div>
            <div class="tab-pane fade" id="uts" role="tabpanel" aria-labelledby="uts-tab">
                <p><strong>{{ $detailNilai['nama_uts'] ?? 'UTS' }}</strong>:
                    {{ $detailNilai['nilai_uts'] ?? 'Belum Ada Nilai' }}</p>
            </div>
            <div class="tab-pane fade" id="uas" role="tabpanel" aria-labelledby="uas-tab">
                <p><strong>{{ $detailNilai['nama_uas'] ?? 'UAS' }}</strong>:
                    {{ $detailNilai['nilai_uas'] ?? 'Belum Ada Nilai' }}</p>
            </div>
            <div class="tab-pane fade" id="tambahan" role="tabpanel" aria-labelledby="tambahan-tab">
                <table class="table table-bordered text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama Tambahan</th>
                            <th>Nilai Tambahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 5; $i++)
                            @if (!empty($detailNilai['nilai_tambahan' . $i]))
                                <tr>
                                    <td>{{ $detailNilai['nama_tambahan' . $i] ?? 'Tambahan ' . $i }}</td>
                                    <td>{{ $detailNilai['nilai_tambahan' . $i] }}</td>
                                </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
