@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Event</h5>
                                </div>
                                <a href="add-event" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Event
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
                                                <p class="text-xs font-weight-bold mb-0">Mp3Fest</p>
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
                                                <p class="text-xs font-weight-bold mb-0 ">IDR 1,2jt</p>
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
                                                    <a href="#" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Detail" style="color: white;">Tersedia</a>
                                                </span>
                                            </td>
                                            {{-- tanggal pelaksanaan --}}
                                            <td class="text-center">
                                                
                                                <p class="text-xs font-weight-bold mb-0">28/06/2024</p>
                                                <p class="text-xs text-secondary mb-0">17.30</p>
                                            </td>
                                            {{-- action --}}
                                            <td class="text-center">
                                                <a href="edit-event" class="mx-3" data-bs-toggle="tooltip"
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
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Penjualan Tiket</h5>
                                </div>
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
                                                Event
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Total Tiket
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Terjual
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Persentase
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">1</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Concert A</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">01/07/2024</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1000</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">700</p>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">70%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success" role="progressbar"
                                                                style="width: 70%;" aria-valuenow="70" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">2</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Concert B</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">10/07/2024</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">2000</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1500</p>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">75%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success"
                                                                role="progressbar" style="width: 75%;" aria-valuenow="75"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">3</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Concert C</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">15/07/2024</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1500</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1000</p>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">67%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success"
                                                                role="progressbar" style="width: 67%;" aria-valuenow="67"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">4</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Concert D</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">20/07/2024</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1200</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">800</p>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">67%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success"
                                                                role="progressbar" style="width: 67%;" aria-valuenow="67"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">5</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Concert E</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">25/07/2024</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1800</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">1700</p>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">94%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success"
                                                                role="progressbar" style="width: 94%;" aria-valuenow="94"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
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
