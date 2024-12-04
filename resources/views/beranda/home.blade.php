@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
        <h3 class="me-auto">
            <a href="{{ route('beranda') }}">Home</a>
        </h3>
        <a href="{{ route('logout') }}"><a href="#" onclick="confirmLogout()">
                <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
            </a>
    </div>

    <!-- Konten Utama -->
    <div class="app-content-header">
        <div class="container-fluid">
            <!-- Waktu di bagian atas -->
            <div class="d-flex justify-content-start align-items-center">
                <p class="text-muted mb-3">{{ now()->addHours(7)->isoFormat('dddd, D MMMM YYYY HH:mm') }}</p>
            </div>

            <!-- Kontainer untuk Komponen -->
            <div class="row">
                <!-- Grafik Kemajuan Studi -->
                <div class="col-md-6">
                    <div class="card p-3 shadow-sm">
                        <h5 class="card-title">Kemajuan Studi</h5>
                        <canvas id="kemajuanStudiChart" height="400"></canvas>
                    </div>
                </div>

                <!-- Pengumuman -->
                <div class="col-md-6">
                    <div class="cards p-3">
                        <h5 class="border-bottom-line text-start">PENGUMUMAN</h5>
                        <ul class="list-unstyled text-start pengumuman">
                            @forelse ($pengumuman as $item)
                                <li>
                                    <a href="{{ route('pengumuman.detail', $item->id) }}" class="text-decoration-none">
                                        <strong
                                            class="@switch($item->sumber)
                                            @case('BEM') text-primary @break
                                            @case('INFO') text-danger @break
                                            @case('BURSAR') text-info @break
                                            @case('KEASRAMAAN') text-success @break
                                            @case('KEMAHASISWAAN') text-purple @break
                                            @default text-dark
                                        @endswitch">
                                            [{{ strtoupper($item->sumber) }}]
                                        </strong>
                                        {{ $item->judul }}
                                    </a>
                                </li>
                            @empty
                                <li class="text-muted">Belum ada pengumuman.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tombol Unduh Kalender -->
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    @if ($akademik)
                        <a href="{{ asset('storage/' . $akademik->file_path) }}" target="_blank"
                            class="btn btn-primary me-2">
                            Unduh Kalender Akademik!
                        </a>
                    @else
                        <button class="btn btn-secondary me-2" disabled>Kalender Akademik Belum Tersedia</button>
                    @endif

                    @if ($bem)
                        <a href="{{ asset('storage/' . $bem->file_path) }}" target="_blank" class="btn btn-primary">
                            Unduh Kalender BEM!
                        </a>
                    @else
                        <button class="btn btn-secondary" disabled>Kalender BEM Belum Tersedia</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Deskripsi Pengumuman -->
    <div class="modal fade" id="pengumumanModal" tabindex="-1" aria-labelledby="pengumumanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pengumumanModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="pengumumanDeskripsi"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pengumumanModal = document.getElementById('pengumumanModal');
            const modalTitle = document.getElementById('pengumumanModalLabel'); // Elemen judul modal
            const modalBody = document.getElementById('pengumumanDeskripsi'); // Elemen deskripsi modal

            pengumumanModal.addEventListener('show.bs.modal', function(event) {
                // Elemen yang memicu modal
                const button = event.relatedTarget;

                // Ambil data dari atribut tombol
                const judul = button.getAttribute('data-judul');
                const deskripsi = button.getAttribute('data-deskripsi');

                // Cetak nilai ke console setelah didefinisikan
                console.log('Judul:', judul);
                console.log('Deskripsi:', deskripsi);

                // Masukkan data ke modal
                modalTitle.textContent = judul;
                modalBody.textContent = deskripsi;
            });
        });

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
                    window.location.href = '{{ route('logout') }}'; // Arahkan ke route logout jika 'Ya' dipilih
                }
            });
        }
    </script>

@section('styles')
    <style>
        #pengumumanModal .modal-content {
            width: 50%;
            margin: 30px auto;
        }
    </style>
@endsection
