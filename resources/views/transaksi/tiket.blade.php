@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="card">
                <div class="card-header p-3">
                    <h6 class="mb-0">Tiket Transaksi</h6>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="mb-0">Tiket ID: {{ $transaction->id }}</h5>
                            <p class="mb-1">Nama User: {{ $transaction->user->name }}</p>
                            <p class="mb-1">Nama Event: {{ $transaction->event->name }}</p>
                            <p class="mb-1">Jumlah Tiket: {{ $transaction->quantity }}</p>
                            <p class="mb-1">Total Harga: {{ 'Rp ' . number_format($transaction->total_price, 0, ',', '.') }}</p>
                            <p class="mb-1">Tanggal Pembayaran: {{ $transaction->payment_date }}</p>
                            <!-- Tambahkan detail lain yang diperlukan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 text-end">
                <a href="{{ route('billings') }}" class="btn bg-gradient-light">
                    Kembali
                </a>  
                <a href="javascript:window.print()" class="btn bg-gradient-primary"><i class="fas fa-print"></i>&nbsp;&nbsp;Cetak</a>
            </div>
        </div>
    </div>
@endsection
