@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ route('tickets.index') }}" class="mb-0 mr-4">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div>
                                    <h5 class="mb-4" style="margin-left: 15px">Edit Tiket</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="nama" value="{{ $ticket->nama }}" id="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="expiry_date" class="form-label">Tiket Berlaku Sampai</label>
                                    <input class="form-control" type="date" name="expiry_date" value="{{ $ticket->expiry_date }}" id="expiry_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-control-label">Harga Tiket</label>
                                    <input class="form-control" type="number" step="0.01" name="price" value="{{ $ticket->price }}" id="price" required>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-control-label">Jumlah Tiket</label>
                                    <input class="form-control" type="number" name="quantity" value="{{ $ticket->quantity }}" id="quantity" required>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('tickets.index') }}" class="btn btn-gradient-dark btn-sm mb-0 me-2">Batal</a>
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
