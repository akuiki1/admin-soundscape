@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Event</h5>
                                </div>
                                <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Event
                                    Baru</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Foto Event
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Event
                                            </th>
                                            
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Venue
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status Event
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Harga tiket
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status Tiket
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal Pelaksanaan
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- id --}}
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">1</p>
                                            </td>
                                            {{-- foto event --}}
                                            <td>
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                </div>
                                            </td>
                                            {{-- nama event --}}
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Admin</p>
                                            </td>
                                            {{-- venue --}}
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Stadion Gelora Bungkarno</p>
                                            </td>
                                            {{-- status event --}}
                                            <td class="text-center">
                                                <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                            </td>
                                            {{-- harga tiket --}}
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0 ">IDR 1,2jt-4,5jt</p>
                                            </td>
                                            {{-- status tiket --}}
                                            <td class="text-center">
                                                {{-- untuk warna bg-gradient
                                                    - Secondary = warna abu
                                                    - Primary = biru modern
                                                    - Success = ijo
                                                    - Danger = merah
                                                    - Warning = kuning
                                                    - info = biru muda
                                                    - light = putih
                                                    - dark = hitam --}}
                                                <span class="badge badge-sm bg-gradient-success">
                                                    <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Detail" style="color: white;">Tersedia</a>
                                                </span>
                                            </td>
                                            {{-- tanggal pelaksanaan --}}
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">28/06/2024</p>
                                                <p class="text-xs text-secondary mb-0">17.30</p>
                                            </td>
                                            {{-- action --}}
                                            <td class="text-center">
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit Event">
                                                    <i class="fas fa-edit text-secondary"></i>
                                                </a>
                                                <span>
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Hapus Event">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
