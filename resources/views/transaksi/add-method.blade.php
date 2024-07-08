@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex flex-row justify-content-between mr-4">
                                <a href="{{ route('billings') }}" class="mb-0 mr-4">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <div>
                                    <h5 class="mb-4" style="margin-left: 15px">Metode Pembayaran Baru</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('billings.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="account_name" class="form-label">Atas Nama Penerima Dana</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number">
                                </div>
                                <div class="mb-3">
                                    <label for="bank_logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="bank_logo" name="bank_logo">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('billings') }}" class="btn btn-gradient-dark btn-sm mb-0 me-2">Batal</a>
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
