@extends('layouts.user_type.auth')

@section('content')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="card">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Metode Pembayaran</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-primary mb-0" href="{{ route('billings.create') }}"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Metode Pembayaran Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        @foreach($paymentMethods as $method)
                        <div class="col-md-3 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg flex align-items-center flex-row">
                                <img class="w-10 me-3 mb-0" src="{{ asset($method->bank_logo) }}" alt="logo">
                                <div class="row">
                                    <p class="text-xs font-weight-bold mb-0">{{ $method->account_name }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $method->account_number }}</p>
                                </div>
                                <div class="d-flex justify-space-between">
                                    <a class="fas fa-pencil-alt ms-auto text-dark cursor-pointer me-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Card" href="{{ route('billings.edit', $method->id) }}"></a>
                                    <form action="{{ route('billings.destroy', $method->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="fas fa-trash-alt ms-auto text-dark cursor-pointer border-0 bg-transparent"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Card"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Daftar Transaksi</h6>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama User
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nama Event
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Harga Tiket
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Jumlah Pembelian Tiket
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Total Harga
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status Pembayaran
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tanggal Pembayaran
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Bukti Transfer
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Tindakan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->id }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->user->nama }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->event->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ 'Rp ' . number_format($transaction->ticket->price, 0, ',', '.') }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->quantity }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ 'Rp ' . number_format($transaction->total_price, 0, ',', '.') }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if ($transaction->status == 'pending')
                                            <p class="badge badge-sm bg-gradient-warning">
                                                {{ ucfirst($transaction->status) }}</p>
                                        @elseif($transaction->status == 'confirmed')
                                            <p class="badge badge-sm bg-gradient-success">
                                                {{ ucfirst($transaction->status) }}</p>
                                        @elseif($transaction->status == 'rejected')
                                            <p class="badge badge-sm bg-gradient-danger">
                                                {{ ucfirst($transaction->status) }}</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction->payment_date }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if ($transaction->payment_proof)
                                            <a href="{{ asset('storage/' . $transaction->payment_proof) }}"
                                                target="_blank" class="badge badge-sm bg-gradient-info">Lihat Bukti</a>
                                        @else
                                            <p class="text-xs font-weight-bold mb-0">Tidak Ada</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($transaction->status == 'pending')
                                            <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                <button type="submit" class="badge badge-sm bg-gradient-success border-0">Konfirmasi</button>
                                            </form>
                                            <form action="{{ route('transactions.reject', $transaction->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                <button type="submit" class="badge badge-sm bg-gradient-danger border-0">Tolak</button>
                                            </form>
                                        @elseif ($transaction->status == 'confirmed')
                                            <a href="#" class="badge badge-sm bg-gradient-dark">Cetak Tiket</a>
                                        @else
                                            <p class="badge badge-sm bg-gradient-danger">Ditolak</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
