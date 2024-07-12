@extends('components.layout')

@section('content')
    <div class="px-4 md:px-0">
        <div class="mx-4 max-w-4xl mx-auto mt-24">
            <x-card class="!p-10">
                <a href="{{ route('index-user') }}" class="inline-block text-black ml-4 mb-4">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
                <div class="flex flex-col items-center text-center">
                    <img class="hidden w-50 md:block"
                        src="{{ $event->photo ? asset($event->photo) : asset('/images/no-image.png') }}"
                        alt="Event Photo" class="w-48 h-100 mb-4" />
                    <h1 class="text-3xl mb-2">{{ $event->name }}</h1>
                    <div class="text-sm my-2">
                        <i class="fa-solid fa-calendar-alt mr-2"></i> {{ $event->date->format('d F Y') }} <br>
                        <i class="fa-solid fa-location-dot mr-2"></i> {{ $event->venue->address }}
                    </div>
                    <div class="border-t border-gray-200 w-full mb-6"></div>
                    <div class="w-full">
                        <h3 class="text-3xl font-bold mb-4">Deskripsi Event</h3>
                        <p class="text-lg space-y-6 pb-10">{{ $event->description }}</p>
                    </div>
                    <h3 class="text-3xl font-bold mb-4">Layout Venue</h3>
                    <div class="flex items-center justify-center mb-6">
                        <img src="{{ $event->venue->photo ? asset($event->venue->photo) : asset('/images/no-image.png') }}" alt="Venue Photo" class="w-50 h-100">
                    </div>
                    <div class="w-full flex justify-between items-center mt-8">
                        <div class="flex flex-col items-start">
                            <h3 class="text-3xl font-bold mb-4">Harga Tiket</h3>
                            <p class="text-lg text-orange-500 mb-6">IDR {{ number_format($event->ticket->price, 0, ',', '.') }} / Tiket</p>
                        </div>
                        <a href="{{ url('buy-ticket', ['event_id' => $event->id]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-xl hover:bg-orange-600 transition duration-300">Beli Tiket</a>
                    </div>                    
                </div>
            </x-card>
        </div>
    </div>
@endsection
