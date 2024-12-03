@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
    <h3 class="me-auto">
        <a href="{{ route('beranda') }}">Home</a> /
        <a href="{{ route('kemajuan_studi') }}">Perkuliahan</a> /
        <a href="{{ route('kemajuan_studi') }}">Kemajuan Studi</a>
        </h3>
        <a href="#" onclick="confirmLogout()" class="ms-auto">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="app-content-header">
        <div class="container-fluid">
            <h3 class="mb-0">Kemajuan Studi</h3>
        </div>
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