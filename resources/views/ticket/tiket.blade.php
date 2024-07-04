@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Kelola Tiket</h5>
                            </div>
                            <a href="tambahkan-tiket-baru" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Tiket Baru</a>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Event
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tersedia
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Terjual
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi
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
                                            <p class="text-xs font-weight-bold mb-0">Rp 50.000</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">1000</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">700</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-gradient-success">Active</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit-tiket" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit tiket">
                                                <i class="fas fa-pencil-alt text-secondary"></i>
                                            </a>
                                            <span>
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Hapus tiket">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                            </span>
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
                                            <p class="text-xs font-weight-bold mb-0">Rp 450.000</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">2000</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">1500</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-gradient-success">Active</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit-tiket" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit tiket">
                                                <i class="fas fa-pencil-alt text-secondary"></i>
                                            </a>
                                            <span>
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Hapus tiket">
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Contoh lainnya -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
