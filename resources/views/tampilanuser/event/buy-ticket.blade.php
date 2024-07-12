@extends('components.layout')

@section('content')
<div class="px-4 md:px-0">
    <div class="mx-4 max-w-4xl mx-auto mt-24">
        <x-card class="!p-10">
            <a href="{{ route('events-user.show', ['id' => $event->id]) }}" class="inline-block text-black ml-4 mb-4">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
            <div class="flex flex-col items-center justify-center text-center">
                <h1 class="text-3xl mb-4">Pembelian Tiket {{ $event->name }}</h1>
                <form action="{{ route('store-buy-ticket', ['event_id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 w-full">
                        <label for="payment_method" class="block text-left">Pilih Metode Pembayaran:</label>
                        <select name="payment_method" id="payment_method" class="w-full p-2 border rounded">
                            @foreach($paymentMethods as $method)
                                <option value="{{ $method->id }}">{{ $method->account_number }} - a/n {{ $method->account_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 w-full">
                        <label for="quantity" class="block text-left">Jumlah Tiket:</label>
                        <input type="number" name="quantity" id="quantity" min="1" class="w-full p-2 border rounded" required oninput="calculateTotal()">
                    </div>
                    <div class="mb-4 w-full">
                        <label for="total_price" class="block text-left">Total Harga:</label>
                        <input type="text" id="total_price" class="w-full p-2 border rounded bg-gray-100" readonly>
                    </div>
                    <div class="mb-4 w-full">
                        <label for="payment_proof" class="block text-left">Unggah Bukti Pembayaran:</label>
                        <input type="file" name="payment_proof" id="payment_proof" class="w-full p-2 border rounded" required>
                        <p class="text-sm text-start">*harap transfer sesuai total harga</p>
                    </div>
                    <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded-xl hover:bg-orange-600 transition duration-300">Beli Tiket</button>
                </form>
                
            </div>
        </x-card>
    </div>
</div>

<script>
    const ticketPrice = {{ $event->ticket->price }};
    
    function calculateTotal() {
        const quantity = document.getElementById('quantity').value;
        const totalPrice = quantity * ticketPrice;
        document.getElementById('total_price').value = `IDR ${new Intl.NumberFormat('id-ID').format(totalPrice)}`;
    }
</script>
@endsection
