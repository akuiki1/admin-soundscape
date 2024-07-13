@extends('components.layout')

@section('content')
<div class="px-4 md:px-0">
    <div class="mx-4 max-w-4xl mx-auto mt-24">
        <x-card class="!p-10 bg-white shadow-md rounded-lg">
            <a href="{{ route('index-user') }}" class="inline-block text-gray-700 ml-4 mb-4 hover:text-gray-900">
                <i class="fa-solid fa-arrow-left"></i> Kembali Ke Beranda
            </a>
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-4xl font-bold text-green-600 mb-4">Pembelian Tiket {{ $event->name }} Berhasil</h1>
                <div class="bg-green-100 p-6 rounded-lg shadow-inner">
                    <p class="text-lg text-gray-800">
                        Terima kasih telah melakukan pembelian tiket untuk acara <strong>{{ $event->name }}</strong>. ID Transaksi Anda adalah <strong>{{ $transaction->id }}</strong>.
                    </p>
                    <p class="mt-4 text-sm text-gray-600">
                        Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, silakan hubungi admin kami dengan mengklik tombol di bawah ini.
                    </p>
                    <a href="https://wa.me/6281254418925?text=Saya%20telah%20melakukan%20pembayaran%20untuk%20event%20{{ $event->name }}%20dengan%20ID%20Transaksi:%20{{ $transaction->id }}" class="mt-6 inline-block bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 transition duration-300">
                        Hubungi Admin
                    </a>
                </div>
            </div>
        </x-card>
    </div>
</div>
@endsection
