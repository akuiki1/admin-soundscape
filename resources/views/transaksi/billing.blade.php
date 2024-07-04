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
                            <a class="btn bg-gradient-primary mb-0" href="metode-pembayaran-baru"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Metode Pembayaran Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <img class="w-10 me-3 mb-0" src="../assets/img/logos/bri.png" alt="logo">
                                <div class="row">
                                    <p class="text-xs font-weight-bold mb-0">Rizki Syandana</p>
                                    <p class="text-xs text-secondary mb-0">0143 0103 5533 505</p>
                                </div>
                                <div class="d-flex justify-space-between">
                                    <a class="fas fa-pencil-alt ms-auto text-dark cursor-pointer me-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Card" href="edit-metode-pembayaran"></a>
                                    <a class="fas fa-trash-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete Card" href="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <img class="w-10 me-3 mb-0" src="../assets/img/logos/bri.png" alt="logo">
                                <div class="row">
                                    <p class="text-xs font-weight-bold mb-0">Rizki Syandana</p>
                                    <p class="text-xs text-secondary mb-0">0143 0103 5533 505</p>
                                </div>
                                <div class="d-flex justify-space-between">
                                    <a class="fas fa-pencil-alt ms-auto text-dark cursor-pointer me-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Card" href="edit-metode-pembayaran"></a>
                                    <a class="fas fa-trash-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete Card" href="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-4">
                            <div
                                class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <img class="w-10 me-3 mb-0" src="../assets/img/logos/bni.png" alt="logo">
                                <div class="row">
                                    <p class="text-xs font-weight-bold mb-0">Rizki Syandana</p>
                                    <p class="text-xs text-secondary mb-0">0143 0103 5533 505</p>
                                </div>
                                <div class="d-flex justify-space-between">
                                    <a class="fas fa-pencil-alt ms-auto text-dark cursor-pointer me-4" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Card" href="edit-metode-pembayaran"></a>
                                    <a class="fas fa-trash-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete Card" href="#"></a>
                                </div>
                            </div>
                        </div>
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
                                    Tanggal Transaksi
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Jumlah Tiket
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
                            @php
                                $transactions = [
                                    [
                                        'id' => 1,
                                        'user_name' => 'John Doe',
                                        'event_name' => 'Concert A',
                                        'created_at' => '2024-06-28',
                                        'ticket_quantity' => 2,
                                        'total_price' => 500000,
                                        'status' => 'pending',
                                        'payment_date' => '2024-06-28',
                                        'payment_proof' => 'example.jpg',
                                    ],
                                    [
                                        'id' => 2,
                                        'user_name' => 'Jane Smith',
                                        'event_name' => 'Concert B',
                                        'created_at' => '2024-06-27',
                                        'ticket_quantity' => 3,
                                        'total_price' => 750000,
                                        'status' => 'confirmed',
                                        'payment_date' => '2024-06-27',
                                        'payment_proof' => 'example2.jpg',
                                    ],
                                    [
                                        'id' => 3,
                                        'user_name' => 'Jane Smith',
                                        'event_name' => 'Concert C',
                                        'created_at' => '2024-06-27',
                                        'ticket_quantity' => 3,
                                        'total_price' => 750000,
                                        'status' => 'rejected',
                                        'payment_date' => '2024-06-27',
                                        'payment_proof' => 'example2.jpg',
                                    ],
                                ];
                            @endphp

                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['id'] }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['user_name'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['event_name'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['created_at'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['ticket_quantity'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['total_price'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if ($transaction['status'] == 'pending')
                                            <p class="badge badge-sm bg-gradient-warning">
                                                {{ ucfirst($transaction['status']) }}</p>
                                        @elseif($transaction['status'] == 'confirmed')
                                            <p class="badge badge-sm bg-gradient-success">
                                                {{ ucfirst($transaction['status']) }}</p>
                                        @elseif($transaction['status'] == 'rejected')
                                            <p class="badge badge-sm bg-gradient-danger">
                                                {{ ucfirst($transaction['status']) }}</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $transaction['payment_date'] }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if ($transaction['payment_proof'])
                                            <a href="{{ asset('storage/' . $transaction['payment_proof']) }}"
                                                target="_blank" class="badge badge-sm bg-gradient-info">Lihat Bukti</a>
                                        @else
                                            <p class="text-xs font-weight-bold mb-0">Tidak Ada</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($transaction['status'] == 'confirmed')
                                            <a href="#" class="badge badge-sm bg-gradient-dark">Cetak Tiket</a>
                                        @elseif ($transaction['status'] == 'pending')
                                            <a href="#" class="badge badge-sm bg-gradient-success">Konfirmasi</a>
                                            <a href="#" class="badge badge-sm bg-gradient-danger">Tolak</a>
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
