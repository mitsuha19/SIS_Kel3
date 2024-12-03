@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
    <h3 class="me-auto">
        <a href="{{ route('beranda') }}">Home</a> /
        <a href="{{ route('prodi') }}">Perkuliahan</a> /
        <a href="{{ route('prodi') }}">Prodi</a>
        </h3>
        <a href="#" onclick="confirmLogout()" class="ms-auto">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Prodi</h3>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Tampilkan nama program studi -->
        @if ($program)
            <h4 class="text-center mb-4">{{ $program->nama }}</h4>
            <hr>

            <!-- Tampilkan Intro -->
            <div class="mb-4">
                <h5>Intro</h5>
                <p>{{ $program->intro }}</p>
            </div>

            <!-- Tampilkan Visi -->
            <div class="mb-4">
                <h5>Visi</h5>
                <p>{{ $program->visi }}</p>
            </div>

            <!-- Tampilkan Misi -->
            <div class="mb-4">
                <h5>Misi</h5>
                <p>{!! nl2br(e($program->misi)) !!}</p>
            </div>
        @else
            <!-- Jika program tidak ditemukan -->
            <p class="text-center text-muted">Data program studi tidak ditemukan.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Apakah anda yakin ingin keluar?',
            text: "Anda akan keluar dari akun ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, keluar!',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('logout') }}';  // Arahkan ke route logout jika 'Ya' dipilih
            }
        });
    }
</script>
@endsection