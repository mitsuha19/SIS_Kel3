@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Breadcrumb dan Header -->
    <div class="d-flex align-items-center mb-4 border-bottom">
        <h3 class="me-auto">Home / Perizinan / Izin Keluar</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-4">Daftar Izin Keluar</h3>

            <!-- Tabel Daftar Izin Keluar -->
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tujuan Izin Keluar</th>
                        <th>Status Permohonan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mempercepat izin bermalam</td>
                        <td>Menunggu Persetujuan BAAK</td>
                    </tr>
                    <tr class="table-secondary">
                        <td>2</td>
                        <td>Memperbaiki kacamata yang rusak</td>
                        <td>Selesai</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mempercepat izin bermalam</td>
                        <td>Selesai</td>
                    </tr>
                    <tr class="table-secondary">
                        <td>4</td>
                        <td>Perbaiki laptop ke Balige</td>
                        <td>Ditolak</td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination">
            <!-- Tombol Sebelumnya -->
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Sebelumnya">
                    &laquo;
                </a>
            </li>
            <!-- Nomor Halaman -->
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><span class="page-link">2</span></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item disabled"><span class="page-link">...</span></li>
            <li class="page-item"><a class="page-link" href="#">8</a></li>
            <li class="page-item"><a class="page-link" href="#">9</a></li>
            <li class="page-item"><a class="page-link" href="#">10</a></li>
            <!-- Tombol Berikutnya -->
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Berikutnya">
                    &raquo;
                </a>
            </li>
        </ul>
    </nav>
</div>
@endsection
