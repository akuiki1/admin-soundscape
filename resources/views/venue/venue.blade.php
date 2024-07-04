@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Venue</h5>
                            </div>
                            <a href="tambahkan-venue-baru" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Venue Baru</a>
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
                                            Venue
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Deskripsi
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat Venue
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Layout Venue
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kapasitas
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">1</p>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm">
                                                <p class="text-xs font-weight-bold mx-4 mb-0">  Stadion Gelora Bungkarno</p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-sm bg-gradient-success">
                                                <a href="#" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Detail" style="color: white;">Detail</a>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Jakarta, Indonesia</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-sm bg-gradient-info">
                                                <a href="show-layout" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Lihat Layout" style="color: white;">Lihat Layout</a>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">18.000 orang</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit-venue" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit venue">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Delete venue">
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
@endsection
