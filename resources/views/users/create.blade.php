@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ url('users') }}" class="mb-0 mr-4">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div>
                                    <h5 class="mb-4" style="margin-left: 15px">Tambahkan User Baru</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="masukkan foto baru"> 
                                </div>
                            
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="nama" value="{{ old('name') }}" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email@email.dns">
                                </div>
                            
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="......" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                                    @error('password')
                                      <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="+62" value="+628">
                                </div>
                            
                                <div class="mb-3">
                                    <label for="location" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="alamat"> 
                                </div>
                            
                                <div class="mb-3">
                                    <label for="about_me" class="form-label">Tentang Saya</label>
                                    <textarea class="form-control" id="about_me" name="about_me" rows="3" placeholder="deskripsikan dirimu"></textarea>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url('users') }}" class="btn btn-gradient-dark btn-sm mb-8 me-2">Batal</a>
                                    <button type="submit" class="btn bg-gradient-primary btn-sm mb-8">Tambahkan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
