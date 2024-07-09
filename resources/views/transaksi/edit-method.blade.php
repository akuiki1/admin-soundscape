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
                                    <h5 class="mb-4" style="margin-left: 15px">Edit Metode Pembayaran</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3">
                            <form action="{{ route('billings.update', $paymentMethod->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="account_name" class="form-label">Atas Nama Penerima Dana</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name" value="{{ old('account_name', $paymentMethod->account_name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="account_number" class="form-label">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number', $paymentMethod->account_number) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bank_logo" class="form-label">Logo</label>
                                    <input type="file" class="form-control" id="bank_logo" name="bank_logo">
                                    @if($paymentMethod->bank_logo)
                                        <img src="{{ asset($paymentMethod->bank_logo) }}" alt="Logo" class="img-thumbnail mt-2" width="100">
                                    @endif
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
