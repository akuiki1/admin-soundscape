@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ url('events') }}" class="mb-0 mr-4">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div>
                                    <h5 class="mb-4" style="margin-left: 15px">Edit Event</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    @if($event->photo)
                                        <img src="{{ asset('storage/' . $event->photo) }}" class="img-thumbnail mt-2" width="200">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_venue" class="form-label">Venue</label>
                                    <select name="id_venue" id="id_venue" class="form-control">
                                        @foreach($venues as $venue)
                                            <option value="{{ $venue->id }}" {{ $venue->id == $event->id_venue ? 'selected' : '' }}>{{ $venue->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_ticket" class="form-label">Tiket</label>
                                    <select name="id_ticket" id="id_ticket" class="form-control">
                                        @foreach($tickets as $ticket)
                                            <option value="{{ $ticket->id }}" {{ $ticket->id == $event->id_ticket ? 'selected' : '' }}>{{ $ticket->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal Pelaksanaan</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d\TH:i') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="segera" {{ $event->status == 'segera'}}>Segera</option>
                                        <option value="aktif" {{ $event->status == 'aktif'}}>Aktif</option>
                                        <option value="berlangsung" {{ $event->status == 'berlangsung'}}>Berlangsung</option>
                                        <option value="berakhir" {{ $event->status == 'berakhir'}}>Berakhir</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ $event->description }}</textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url('events') }}" class="btn btn-gradient-dark btn-sm mb-0 me-2">Batal</a>
                                    <button type="submit" class="btn bg-gradient-primary btn-sm mb-0">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
