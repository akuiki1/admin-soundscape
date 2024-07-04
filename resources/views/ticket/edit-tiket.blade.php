@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ route('tiket') }}" class="mb-0 mr-4">
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
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" placeholder="1" class="form-control" name="id" disabled />
                                </div>
                                <div class="mb-3">
                                    <label for="status">Event</label>
                                    <select class="form-control" id="status" name="status">
                                        <option>Avenged Sevenfold</option>
                                        <option>Queen</option>
                                        <option>Seventeen</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal-expired-tiket" class="form-label">Tiket Berlaku Sampai</label>
                                    <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                        id="tanggal-expired-tiket">
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-control-label">Harga Tiket</label>
                                    <input class="form-control" type="text" value="Rp " id="Harga" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-control-label">Jumlah Tiket</label>
                                    <input class="form-control" type="number" value="1" id="Jumlah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status Tiket</label>
                                    <select class="form-control" id="status" name="status">
                                        <option>pra-order</option>
                                        <option>aktif</option>
                                        <option>berakhir</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('tiket') }}" class="btn btn-gradient-dark btn-sm mb-0 me-2">Batal</a>
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
