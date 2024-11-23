@extends('layouts.app') <!-- Layout utama -->

@section('content')
    <!-- Header -->
    <div class="d-flex align-items-center mb-4 border-bottom-line">
        <h3 class="me-auto"> <i class="fas fa-wallet"></i> Home / Bursar</h3>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt fs-5 cursor-pointer" title="Logout"></i>
        </a>
    </div>

    <div class=" d-flex mb-4 text-start">
        <div class="me-auto">
            <h4 class="mb-2">Tagihan Terbaru</h4>
            <button class="btn btn-primary custom-btn mb-5">Semua Tagihan Sudah Diproses</button>
        </div>
        <h5 class="va-text mb-5">VA (Bank Mandiri) 8823 3111 1722 036</h5>
    </div>

    <!-- Riwayat Tagihan -->
    <div class="card-header bg-white mt-5 mb-4">
        <h4 class="text-start"><i class= "fas fa-history me-2"></i> History Tagihan</h4>
        <h5 class=" text-start"><i class="fas fa-lock me-2"></i> CLOSED: Closed Payment, VER: Verified, VWC: Verified With
            Credit, POS: Postponed, </h5>
        <h5 class=" text-start"> NEW: New Bill, REQ: Payment Requested, RPO: Req for Postpone, RCR: Req for Credit </h5>
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
                    <td>2,187,500.00</td>
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
                    <td>2,187,500.00</td>
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
                    <td>2,187,500.00</td>
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
