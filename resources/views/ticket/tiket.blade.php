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
                            <a href="{{ route('tickets.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Tiket Baru</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tersedia</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td class="ps-4">{{ $ticket->id }}</td>
                                            <td>{{ $ticket->nama }}</td>
                                            <td class="text-center">{{ $ticket->expiry_date }}</td>
                                            <td class="text-center">{{ $ticket->price }}</td>
                                            <td class="text-center">{{ $ticket->quantity }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit ticket">
                                                    <i class="fas fa-pencil-alt text-secondary"></i>
                                                </a>
                                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border:none; background:none;" data-bs-toggle="tooltip" data-bs-original-title="Hapus ticket">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
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
