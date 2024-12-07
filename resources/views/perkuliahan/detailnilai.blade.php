@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-3">Detail Mata Kuliah</h3>

        <div class="card p-3 shadow-sm">
            <h5 class="card-title">{{ $matkul['nama_kul_ind'] }}</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $matkul['kode_mk'] }}</td>
                        <td>{{ $matkul['nama_kul_ind'] }}</td>
                        <td>{{ $matkul['sks'] }}</td>
                        <td>{{ $matkul['na'] }}</td>
                        <td>{{ $matkul['nilai'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
