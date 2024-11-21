@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4">
        <h4 class="me-auto">Home / Bursar</h4>
        <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
    </div>

    <div class="mb-4 text-start">
        <h5 class="mb-2">Tagihan Terbaru</h5>
        <button class="btn btn-primary custom-btn mb-5">Semua Tagihan Sudah Diproses</button>
    </div>



    <!-- Riwayat Tagihan -->
        <div class="card-header bg-white mt-5 mb-4">
            <h5 class="text-start">History Tagihan</h5>
            <h6 class=" text-start"> CLOSED: Closed Payment, VER: Verified, VWC: Verified With Credit, POS: Postponed, </h6>
            <h6 class=" text-start">  NEW: New Bill, REQ: Payment Requested, RPO: Req for Postpone, RCR: Req for Credit </h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Payment Periode</th>
                        <th>Tagihan (Rp.)</th>
                        <th>Hutang (Rp.)</th>
                        <th>Total (Rp.)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data Dummy -->
                    <tr>
                        <td>1</td>
                        <td>2024/Gasal/November</td>
                        <td>CLOSED 2,187,500.00</td>
                        <td>-</td>
                        <td>2,187,500.00</td>
                        <td>VER</td>
                        <td>
                            <button class="btn btn-sm btn-secondary">
                                <i class="fas fa-info-circle"></i> <small> Details </small>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2024/Gasal/Oktober</td>
                        <td>CLOSED 2,187,500.00</td>
                        <td>-</td>
                        <td>2,187,500.00</td>
                        <td>VER</td>
                        <td>
                        <button class="btn btn-sm btn-secondary">
                                <i class="fas fa-info-circle"></i> <small> Details </small>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2024/Gasal/September</td>
                        <td>CLOSED 2,187,500.00</td>
                        <td>-</td>
                        <td>2,187,500.00</td>
                        <td>VER</td>
                        <td>
                        <button class="btn btn-sm btn-secondary">
                                <i class="fas fa-info-circle"></i> <small> Details </small>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection
