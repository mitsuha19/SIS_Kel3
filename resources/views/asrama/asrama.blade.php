@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom">
        <h3 class="me-auto">Home / Asrama</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <!-- Konten Utama -->
    <div class="container mt-4">
        <h3 class="text-center mb-4">Informasi Asrama</h3>
        <hr>

        <!-- Informasi Asrama -->
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-6">
                <div class="equal-height">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ASRAMA</th>
                                <td>Nazareth, Luar Kampus/Pintubosi</td>
                            </tr>
                            <tr>
                                <th>PENGURUS ASRAMA</th>
                                <td>
                                    - Pdt. Irinto Sitorus, S.Th. <br>
                                    - Pdt. Begawan Johannes Sitompul, S.Th. <br>
                                    - Pdt. Herman Manurung, S.Th.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-6">
                <div class="equal-height">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kamar</th>
                                <td>Kamar, 1 Lantai 4</td>
                            </tr>
                            <tr>
                                <th>Teman Sekamar</th>
                                <td>
                                    - Christian Theofani Napitupulu (2022), S1 Informatika <br>
                                    - Yisrael Schwartz Sijabat (2022), S1 Informatika <br>
                                    - Wesly Beretta Siahaan (2022), S1 Informatika <br>
                                    - Herrmon Rantua Sihombing (2022), S1 Informatika
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
