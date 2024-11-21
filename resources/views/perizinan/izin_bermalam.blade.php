@extends('layouts.app') <!-- Layout utama -->

@section('content')
        <!-- Header -->
    <div class="d-flex align-items-center mb-5 border-bottom-line">
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
                    <tr>
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
                    <tr>
                        <td>4</td>
                        <td>Disetujui</td>
                        <td>Pdt.Irianto Sitorus</td>
                        <td>Pulang kerumah</td>
                        <td>Tarutung</td>
                        <td>15 Nov 2024 16:30</td>
                        <td>17 Nov 2024 20:00</td>
                    </tr>
                    <tr>
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
@endsection
