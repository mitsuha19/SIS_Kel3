@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <div class="d-flex align-items-center mb-4 border-bottom-line">
                <h3 class="me-auto">Home</h3>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
                </a>
            </div>

            <div class="col-md-6">
                <div class="cards p-3">
                    <h5 class="border-bottom-line text-start">PENGUMUMAN</h5>
                    <ul class="list-unstyled text-start pengumuman">
                    @forelse ($pengumuman as $item)
                    <li class="d-flex justify-content-between align-items-center mb-2">
    <span>
        <strong class="@switch($item->sumber)
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
    </span>
    <div class="ms-3">
        <form method="POST" action="{{ route('pengumuman.destroy', $item->id) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger p-0" 
                onclick="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?');" title="Hapus">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
</li>
@empty
    <li class="text-muted">Belum ada pengumuman.</li>
@endforelse
                    </ul>
                </div>
            </div>


            <div class="mt-4">
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalKalenderAkademik">Unggah
                    Kalender Akademik</button>
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalKalenderBEM">Unggah
                    Kalender BEM</button>
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalPengumuman">Unggah
                    Pengumuman</button>
            </div>

            <div class="mt-3">
                @php
                    $akademik = \App\Models\Calendar::where('type', 'akademik')->latest()->first();
                    $bem = \App\Models\Calendar::where('type', 'bem')->latest()->first();
                @endphp

                @if ($akademik)
                    <p><a href="{{ asset('storage/' . $akademik->file_path) }}" target="_blank">Lihat Kalender Akademik</a>
                    </p>
                @endif

                @if ($bem)
                    <p><a href="{{ asset('storage/' . $bem->file_path) }}" target="_blank">Lihat Kalender BEM</a></p>
                @endif
            </div>

        </div>
    </div>

    <!-- Modal Kalender Akademik -->
    <div class="modal fade" id="modalKalenderAkademik" tabindex="-1" aria-labelledby="modalKalenderAkademikLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKalenderAkademikLabel">Unggah Kalender Akademik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('calendar.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="type" value="akademik">
                        <div class="mb-3">
                            <label for="fileKalenderAkademik" class="form-label">Pilih File</label>
                            <input type="file" name="file" class="form-control" id="fileKalenderAkademik" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Kalender BEM -->
    <div class="modal fade" id="modalKalenderBEM" tabindex="-1" aria-labelledby="modalKalenderBEMLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKalenderBEMLabel">Unggah Kalender BEM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('calendar.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="type" value="bem">
                        <div class="mb-3">
                            <label for="fileKalenderBEM" class="form-label">Pilih File</label>
                            <input type="file" name="file" class="form-control" id="fileKalenderBEM" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Unggah Pengumuman -->
    <!-- Modal Unggah Pengumuman -->
    <div class="modal fade" id="modalPengumuman" tabindex="-1" aria-labelledby="modalPengumumanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalPengumumanLabel">Unggah Kalender Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formPengumuman" method="POST" action="{{ route('pengumuman.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="sumberPengumuman" class="form-label">Sumber</label>
                            <select class="form-control" name="sumber" id="sumberPengumuman" required>
                                <option value="">Pilih Sumber</option>
                                <option value="BEM">BEM</option>
                                <option value="Info">INFO</option>
                                <option value="Bursar">BURSAR</option>
                                <option value="Keasramaan">KEASRAMAAN</option>
                                <option value="Kemahasiswaan">KEMAHASISWAAN</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="judulPengumuman" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judulPengumuman"
                                placeholder="Masukkan judul pengumuman" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsiPengumuman" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsiPengumuman" rows="4"
                                placeholder="Masukkan deskripsi pengumuman" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="uploadPengumuman">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('uploadPengumuman').addEventListener('click', function() {
            // Ambil nilai sumber, judul, dan deskripsi
            const sumber = document.getElementById('sumberPengumuman').value;
            const judul = document.getElementById('judulPengumuman').value;
            const deskripsi = document.getElementById('deskripsiPengumuman').value;

            // Validasi input
            if (sumber.trim() === "" || judul.trim() === "" || deskripsi.trim() === "") {
                alert('Semua bidang harus diisi!');
                return;
            }

            // Tambahkan pengumuman ke daftar (simulasi update frontend)
            const ul = document.querySelector('ul');
            const li = document.createElement('li');
            li.innerHTML = `<span class="text-primary">[${sumber.toUpperCase()}]</span> ${judul} - ${deskripsi}`;
            ul.appendChild(li);

            // Reset form
            document.getElementById('sumberPengumuman').value = '';
            document.getElementById('judulPengumuman').value = '';
            document.getElementById('deskripsiPengumuman').value = '';

            // Tutup modal
            const modalPengumuman = new bootstrap.Modal(document.getElementById('modalPengumuman'));
            modalPengumuman.hide();
        });
    </script>
@endsection
