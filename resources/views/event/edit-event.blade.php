@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="event" class="mb-0 mr-4">
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
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" placeholder="1" class="form-control" name="id" disabled />
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Event</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="venue">Venue</label>
                                    <select class="form-control" id="venue" name="venue">
                                        <option>stadion gelora bungkarno</option>
                                        <option>Lapangan Dwi Warna Barabai</option>
                                        <option>Gedung Sultan Suryansyah, Banjarmasin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tiket">Tiket</label>
                                    <select class="form-control" id="tiket" name="tiket">
                                        <option>belum ada tiket</option>
                                        <option>tersedia</option>
                                        <option>habis</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status Event</label>
                                    <select class="form-control" id="status" name="status">
                                        <option>Segera</option>
                                        <option>Aktif</option>
                                        <option>Selesai</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal-expired-tiket" class="form-label">Tanggal Pelaksanaan</label>
                                    <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                        id="tanggal-expired-tiket">
                                </div>
                                <div class="mb-3">
                                    <label for="about_me" class="form-label">Deskripsi event</label>
                                    <textarea class="form-control" id="about_me" name="about_me" rows="3"></textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="event"
                                        class="btn btn-gradient-dark btn-sm mb-0 me-2">Batal</a>
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
