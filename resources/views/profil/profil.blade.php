@extends('layouts.app')

@section('content')
    <div class="app-wrapper px-4">
        <!-- Header Halaman -->
        <div class="d-flex align-items-center mb-4">
            <h5 class="me-auto">Home / Profil</h5>
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </div>

        <!-- Konten Utama -->
        <div class="d-flex flex-column align-items-center">
            <!-- Foto Profil -->
            <div class="card text-center shadow-sm mb-4" style="width: 300px;">
                <img src="{{ asset('assets/img/profil.jpg') }}" alt="Profile Picture" class="rounded-circle mt-3 mx-auto"
                    style="width: 150px; height: 150px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title mb-0">Rohit Panjaitan</h5>
                    <p class="text-muted">11S22036</p>
                </div>
            </div>

            <!-- Kolom Data -->
            <div class="d-flex justify-content-between align-items-start flex-wrap w-100">
                <!-- Data Ayah -->
                <div class="card shadow-sm p-3 m-2 flex-grow-1" style="max-width: 300px;">
                    <h5 class="card-title text-center mb-3">DATA AYAH</h5>
                    <ul class="list-unstyled">
                        <li><strong>Nama:</strong> Pardede Sinaga</li>
                        <li><strong>Email:</strong> pardede.sinaga@gmail.com</li>
                        <li><strong>No. Telepon:</strong> 081298765432</li>
                    </ul>
                </div>

                <!-- Data Pribadi -->
                <div class="card shadow-sm p-3 m-2 flex-grow-1" style="max-width: 300px;">
                    <h5 class="card-title text-center mb-3">DATA PRIBADI</h5>
                    <ul class="list-unstyled">
                        <li><strong>Nama:</strong> Rohit Panjaitan</li>
                        <li><strong>Email:</strong> ifs22036@students.del.ac.id</li>
                        <li><strong>No. Telepon:</strong> 082273434986</li>
                    </ul>
                </div>

                <!-- Data Ibu -->
                <div class="card shadow-sm p-3 m-2 flex-grow-1" style="max-width: 300px;">
                    <h5 class="card-title text-center mb-3">DATA IBU</h5>
                    <ul class="list-unstyled">
                        <li><strong>Nama:</strong> Maria Simorangkir</li>
                        <li><strong>Email:</strong> maria.simorangkir@gmail.com</li>
                        <li><strong>No. Telepon:</strong> 082234567890</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
