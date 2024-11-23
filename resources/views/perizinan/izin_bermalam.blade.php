@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
        <h3 class="me-auto">Home / Perizinan / Izin Bermalam</h3>
        <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
    </div>

    <!-- Konten Utama -->
    <div class="app-content-header">
        <div class="container-fluid">
            <h4 class="mb-5">Daftar Izin Bermalam</h4>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Status Permohonan</th>
                    <th>Persetujuan dari</th>
                    <th>Keperluan Izin Bermalam</th>
                    <th>Tujuan</th>
                    <th>Berangkat</th>
                    <th>Pulang</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data Dummy -->
                <tr>
                    <td>1</td>
                    <td>Disetujui</td>
                    <td>Pdt.Irianto Sitorus</td>
                    <td>Pulang kerumah</td>
                    <td>Tarutung</td>
                    <td>15 Nov 2024 16:30</td>
                    <td>17 Nov 2024 20:00</td>
                </tr>
                <tr class="table-secondary">
                    <td>2</td>
                    <td>Disetujui</td>
                    <td>Pdt.Irianto Sitorus</td>
                    <td>Pulang kerumah</td>
                    <td>Tarutung</td>
                    <td>15 Nov 2024 16:30</td>
                    <td>17 Nov 2024 20:00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Disetujui</td>
                    <td>Pdt.Irianto Sitorus</td>
                    <td>Pulang kerumah</td>
                    <td>Tarutung</td>
                    <td>15 Nov 2024 16:30</td>
                    <td>17 Nov 2024 20:00</td>
                </tr>
                <tr class="table-secondary">
                    <td>4</td>
                    <td>Disetujui</td>
                    <td>Pdt.Irianto Sitorus</td>
                    <td>Pulang kerumah</td>
                    <td>Tarutung</td>
                    <td>15 Nov 2024 16:30</td>
                    <td>17 Nov 2024 20:00</td>
                </tr>
                <tr >
                    <td>5</td>
                    <td>Disetujui</td>
                    <td>Pdt.Irianto Sitorus</td>
                    <td>Pulang kerumah</td>
                    <td>Tarutung</td>
                    <td>15 Nov 2024 16:30</td>
                    <td>17 Nov 2024 20:00</td>
                </tr>
            </tbody>
        </table>
    </div>
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
