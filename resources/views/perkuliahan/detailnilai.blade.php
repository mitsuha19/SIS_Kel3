@extends('layouts.app')

@section('content')
    <div class="container mt-4">
    <div class="d-flex align-items-center mb-4 border-bottom">
            <h3 class="me-auto">
                <a href="{{ route('beranda') }}">Home</a> /
                <a href="#">Perkuliahan</a> /
                <a href=#>Kemajuan Studi</a>/
                <a href=#>Detail Nilai</a>
            </h3>
            <a href="#" onclick="confirmLogout()" class="ms-auto">
                <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
            </a>
        </div>
         <!-- Judul Halaman -->
         <h3 class="mb-3 underline-bold">Nilai Mahasiswa</h3>
          <!-- Tabel Informasi Mahasiswa -->
        <div class="card p-3 shadow-sm mb-4 table-container">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>NIM</th>
                        <td>1234567</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>Mahasiswa</td>
                    </tr>
                    <tr>
                        <th>Kode MK</th>
                        <td>MA41101</td>
                    </tr>
                    <tr>
                        <th>Nama Matakuliah</th>
                        <td>Matematika Diskrit</td>
                    </tr>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <td>2024/2025</td>
                    </tr>
                    <tr>
                        <th>Semester Tahun Ajaran</th>
                        <td>2024</td>
                    </tr>
                    <tr>
                        <th>Nilai Akhir</th>
                        <td>52.5</td>
                    </tr>
                    <tr>
                        <th>Grade</th>
                        <td>C</td>
                    </tr>
                </tbody>
            </table>
        </div>

     <!-- Tabs -->
<ul class="nav nav-tabs bg-primary text-white rounded table-container" id="nilaiTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link  fw-bold" id="praktikum-tab" 
                data-bs-toggle="tab" data-bs-target="#praktikum" 
                type="button" role="tab" aria-controls="praktikum" aria-selected="true">
            Praktikum
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="tugas-tab" 
                data-bs-toggle="tab" data-bs-target="#tugas" 
                type="button" role="tab" aria-controls="tugas" aria-selected="false">
            Tugas
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="quis-tab" 
                data-bs-toggle="tab" data-bs-target="#quis" 
                type="button" role="tab" aria-controls="quis" aria-selected="false">
            Quis
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="uts-tab" 
                data-bs-toggle="tab" data-bs-target="#uts" 
                type="button" role="tab" aria-controls="uts" aria-selected="false">
            UTS
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="uas-tab" 
                data-bs-toggle="tab" data-bs-target="#uas" 
                type="button" role="tab" aria-controls="uas" aria-selected="false">
            UAS
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="tambahan-tab" 
                data-bs-toggle="tab" data-bs-target="#tambahan" 
                type="button" role="tab" aria-controls="tambahan" aria-selected="false">
            Tambahan
        </button>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content  rounded-bottom  table-container " id="nilaiTabsContent">
    <!-- Tab Praktikum -->
    <div class="tab-pane fade  p-3" id="praktikum" role="tabpanel" aria-labelledby="praktikum-tab">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Praktikum</td>
                    <td>90</td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <!-- Tab Tugas -->
    <div class="tab-pane fade p-3" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tugas</td>
                    <td>85</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tab Quis -->
    <div class="tab-pane fade p-3" id="quis" role="tabpanel" aria-labelledby="quis-tab">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quis</td>
                    <td>88</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tab UTS -->
    <div class="tab-pane fade p-3" id="uts" role="tabpanel" aria-labelledby="uts-tab">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>UTS</td>
                    <td>78</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tab UAS -->
    <div class="tab-pane fade p-3" id="uas" role="tabpanel" aria-labelledby="uas-tab">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>UAS</td>
                    <td>83</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tab Tambahan -->
    <div class="tab-pane fade p-3" id="tambahan" role="tabpanel" aria-labelledby="tambahan-tab">
        <table class="table table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tambahan</td>
                    <td>95</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
  <!-- Tabel Detail Nilai -->
        <div class="card p-3 shadow-sm mt-5">
            <h5 class="card-title">{{ $matkul['nama_kul_ind'] }}</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $matkul['kode_mk'] }}</td>
                        <td>{{ $matkul['nama_kul_ind'] }}</td>
                        <td>{{ $matkul['sks'] }}</td>
                        <td>{{ $matkul['na'] }}</td>
                        <td>{{ $matkul['nilai'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection