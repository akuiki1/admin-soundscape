@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h1>{{ $event->name }}</h1>
    <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->name }}">
    <p>{{ $event->description }}</p>
    <p>Venue: {{ $event->venue->name }}</p>
    <p>Harga Tiket: IDR {{ number_format($event->ticket->price, 2) }}</p>
    <p>Tanggal: {{ $event->date->format('d/m/Y H:i') }}</p>
    <p>Status: {{ ucfirst($event->status) }}</p>
</div>
@endsection
