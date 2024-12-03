@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center mb-4 border-bottom-line">
        <h3 class="me-auto">Beranda / Home / Pengumuman</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Detail Pengumuman -->
    <div class="container mt-4">
        <!-- Pewarnaan Sumber Pengumuman -->
        <h1 class="text-start" style="font-size: 2rem;">
            <strong
                class="@switch($pengumuman->sumber)
                @case('BEM') text-primary @break
                @case('INFO') text-danger @break
                @case('BURSAR') text-info @break
                @case('KEASRAMAAN') text-success @break
                @case('KEMAHASISWAAN') text-purple @break
                @default text-dark
            @endswitch">
                [{{ strtoupper($pengumuman->sumber) }}]
            </strong>
            {{ $pengumuman->judul }}
        </h1>
        <hr>
        <!-- Isi Pengumuman -->
        <p class="mt-3 text-start" style="font-size: 1.125rem;">{{ $pengumuman->deskripsi }}</p>
    </div>
@endsection
