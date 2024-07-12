@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ route('events.index') }}" class="mb-0 mr-4">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div>
                                    <h5 class="mb-4" style="margin-left: 15px">Tambahkan Event Baru</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_venue" class="form-label">Venue</label>
                                    <select name="id_venue" id="id_venue" class="form-control" required>
                                        <option value="">Pilih Venue</option>
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id_venue }}">{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_ticket" class="form-label">Tiket</label>
                                    <select name="id_ticket" id="id_ticket" class="form-control">
                                        <option value="">Pilih Tiket</option>
                                        @foreach($tickets as $ticket)
                                            <option value="{{ $ticket->id }}">{{ $ticket->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal Pelaksanaan</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="segera">Segera</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="berlangsung">Berlangsung</option>
                                        <option value="berakhir">Berakhir</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <button type="submit" class="btn bg-gradient-primary btn-md mt-4 mb-4">Tambah Event</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
