@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom">
        <h3 class="me-auto">Home / Catatan Perilaku</h3>
        <a href="{{ route('logout') }}"><a href="#" onclick="confirmLogout()">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="container mt-4">
        <h3 class="text-center mb-4">Daftar Nilai Perilaku Mahasiswa</h3>
        <hr class="mb-4">

        <!-- Tabel -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>TA</th>
                    <th>Semester</th>
                    <th>Skor Awal</th>
                    <th>Akumulasi Skor</th>
                    <th>Nilai Huruf</th>
                    <th></th> <!-- Untuk tombol view di akhir tabel -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024/2025</td>
                    <td>Gasal</td>
                    <td>0</td>
                    <td>0</td>
                    <td>A</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2023/2024</td>
                    <td>Pendek</td>
                    <td>0</td>
                    <td>0</td>
                    <td>A</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2023/2024</td>
                    <td>Genap</td>
                    <td>0</td>
                    <td>0</td>
                    <td>A</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>2023/2024</td>
                    <td>Gasal</td>
                    <td>0</td>
                    <td>3</td>
                    <td>AB</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>2022/2023</td>
                    <td>Pendek</td>
                    <td>0</td>
                    <td>0</td>
                    <td>A</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>2022/2023</td>
                    <td>Genap</td>
                    <td>0</td>
                    <td>6</td>
                    <td>B</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>2022/2023</td>
                    <td>Gasal</td>
                    <td>0</td>
                    <td>8</td>
                    <td>B</td>
                    <td><button class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left"></i></button></td>
                </tr>
            </tbody>
        </table>
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
