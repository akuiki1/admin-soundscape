@props(['venue'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $venue->foto ? asset('storage/payment_proofs/' . $venue->foto) : asset('/images/no-image.png') }}" alt="foto venue" />
        <div>
            <h3 class="text-2xl font-bold text-orange-500 mb-6">
                <a href="/venues/{{ $venue->id }}">{{ $venue->nama }}</a>
            </h3>
            <div class="text-s font-regular mb-4">{{ $venue->alamat }}</div>
            <div class="text-s font-medium">Kapasitas : {{ $venue->kapasitas }}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid"></i> {{ $venue->kota }}, {{ $venue->deskripsi }}
            </div>
        </div>
    </div>
</x-card>
