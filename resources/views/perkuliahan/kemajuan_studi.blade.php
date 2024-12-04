@extends('layouts.app')

@section('content')
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

    <div class="container mt-4">
        <h3 class="mb-3">Kemajuan Studi</h3>
        <!-- Grafik Kemajuan Studi -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-3 shadow-sm">
                    <h5 class="card-title">Grafik Kemajuan Studi</h5>
                    <canvas id="kemajuanStudiChart" height="250"></canvas>
                </div>
            </div>
        </div>
        ip = {{ $data['IP'] }}
        <!-- Tabel Mata Kuliah -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card p-3 shadow-sm">
                    <h5 class="card-title">Daftar Mata Kuliah</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Dummy Mata Kuliah -->
                            <tr>
                                <td>CS101</td>
                                <td>Algoritma dan Struktur Data</td>
                                <td>3</td>
                                <td>Semester 1</td>
                            </tr>
                            <tr>
                                <td>CS102</td>
                                <td>Basis Data</td>
                                <td>3</td>
                                <td>Semester 2</td>
                            </tr>
                            <tr>
                                <td>CS201</td>
                                <td>Pemrograman Web</td>
                                <td>3</td>
                                <td>Semester 3</td>
                            </tr>
                            <tr>
                                <td>CS202</td>
                                <td>Jaringan Komputer</td>
                                <td>3</td>
                                <td>Semester 4</td>
                            </tr>
                            <tr>
                                <td>CS301</td>
                                <td>Rekayasa Perangkat Lunak</td>
                                <td>4</td>
                                <td>Semester 5</td>
                            </tr>
                            <tr>
                                <td>CS302</td>
                                <td>Keamanan Informasi</td>
                                <td>3</td>
                                <td>Semester 6</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk grafik
        const labels = {!! json_encode($labels) !!};
        const dataValues = {!! json_encode($values) !!};

        const ctx = document.getElementById('kemajuanStudiChart').getContext('2d');
        const kemajuanStudiChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels, // Label sumbu X
                datasets: [{
                    label: 'Nilai IP Semester',
                    data: dataValues, // Data nilai IP semester
                    borderColor: '#007bff', // Warna garis
                    backgroundColor: 'rgba(0, 123, 255, 0.2)', // Warna area di bawah garis
                    fill: true, // Isi area di bawah garis
                    tension: 0.3, // Kelengkungan garis
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nilai IP Semester',
                        },
                    },
                },
            },
        });
    </script>
@endsection
