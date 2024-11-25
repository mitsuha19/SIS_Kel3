@extends('layouts.app')

@section('content')
    <div class="d-flex">

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <div class="d-flex align-items-center mb-4 border-bottom-line">
                <h3 class="me-auto">Home</h3>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
                </a>
            </div>

            <h4>Pengumuman</h4>
            <ul>
                <li><span class="text-primary">[KEMAHASISWAAN]</span> Ketentuan dan Prosedur Pembayaran Bursar Mahasiswa</li>
                <li><span class="text-danger">[INFO]</span> Ret-Ret 2022 Gelombang Ke-2</li>
                <li><span class="text-danger">[INFO]</span> Ret-Ret 2022 Gelombang Ke-1</li>
                <li><span class="text-primary">[BURSAR]</span> Pembayaran Bursar Mahasiswa Oktober 2024</li>
                <li><span class="text-primary">[BEM]</span> Kegiatan Mahasiswa Festival Seni Budaya 2024</li>
                <li><span class="text-primary">[BURSAR]</span> Pembayaran Bursar Mahasiswa September 2024</li>
                <li><span class="text-primary">[BURSAR]</span> Pembayaran Bursar Mahasiswa Agustus 2024</li>
            </ul>

            <div class="mt-4">
                <button class="btn btn-primary mb-2">Unggah Kalender Akademik</button>
                <button class="btn btn-primary mb-2">Unggah Kalender BEM</button>
                <button class="btn btn-primary mb-2">Unggah Pengumuman</button>
            </div>
        </div>
    </div>
@endsection
