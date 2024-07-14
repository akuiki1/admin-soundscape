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
                            <a href="{{ route('venues.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Venue Baru</a>
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
                                            Venue
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat Venue
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Layout Venue
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kapasitas
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($venues as $venue)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $venue->id_venue }}</p>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <img src="{{ asset($venue->photo) }}" class="avatar avatar-sm">
                                                <p class="text-xs font-weight-bold mx-4 mb-0">{{ $venue->name }}</p>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ Str::limit($venue->address, 50) }}</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-sm bg-gradient-info">
                                                <a href="{{ route('showLayout', ['id' => $venue->id_venue ?? 0]) }}" data-bs-toggle="tooltip" data-bs-original-title="Lihat Layout" style="color: white;">Lihat Layout</a>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $venue->capacity }} orang</p>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('venues.edit', ['id' => $venue->id_venue ?? 0]) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit venue">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <form action="{{ route('venues.destroy', ['id' => $venue->id_venue ?? 0]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link mx-3" data-bs-toggle="tooltip" data-bs-original-title="Hapus venue" onclick="return confirm('Apakah Anda yakin untuk menghapus venue ini?')">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
