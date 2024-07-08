@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex flex-row justify-content-between">
                                <div>
                                    <h5 class="mb-0">Event</h5>
                                </div>
                                <a href="{{ route('events.create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Event Baru</a>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto Event</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Event</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Venue</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Tiket</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pelaksanaan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $event)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $event->id }}</p>
                                            </td>
                                            <td>
                                                <div>
                                                    <img src="{{ asset('storage/' . $event->photo) }}" class="avatar avatar-sm me-3">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $event->name }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $event->venue->name }}</p>
                                            </td>
                                            
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">IDR {{ number_format($event->ticket->price, 2) }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $event->date->format('d/m/Y') }}</p>
                                                <p class="text-xs text-secondary mb-0">{{ $event->date->format('H:i') }}</p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('events.edit', $event->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Event">
                                                    <i class="fas fa-edit text-secondary"></i>
                                                </a>                                                
                                                <span>
                                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link mx-3" data-bs-toggle="tooltip" data-bs-original-title="Hapus Event" onclick="return confirm('Apakah Anda yakin untuk menghapus event ini?')">
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </button>
                                                    </form>                                                    
                                                </span>
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
    </main>
@endsection
