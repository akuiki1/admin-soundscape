@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ url('venues') }}" class="mb-0 mr-4">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div>
                                    <h5 class="mb-4" style="margin-left: 15px">Edit Venue</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('venues.update', $venue->id_venue) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Venue</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $venue->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                    @if($venue->photo)
                                        <img src="{{ asset('storage/assets/img/' . $venue->photo) }}" alt="Current Photo" width="100">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="address" value="{{ $venue->address }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="layout" class="form-label">Layout Venue</label>
                                    <input type="file" class="form-control" id="layout" name="layout">
                                    @if($venue->layout)
                                        <img src="{{ asset('storage/assets/img/' . $venue->layout) }}" alt="Current Layout" width="100">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas" class="form-label">Kapasitas</label>
                                    <input class="form-control" type="number" id="kapasitas" name="capacity" value="{{ $venue->capacity }}" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url('venues') }}" class="btn btn-gradient-dark btn-sm mb-0 me-2">Batal</a>
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
