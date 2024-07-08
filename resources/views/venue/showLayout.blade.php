@extends('layouts.user_type.auth')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Layout {{ $venue->name }}</h3>
                    </div>
                    <div class="card-body">
                        @if($venue->layout)
                            <div class="text-center">
                                <img src="{{ asset($venue->layout) }}" alt="Layout {{ $venue->name }}" class="img-fluid">
                            </div>
                        @else
                            <p class="text-center">Layout tidak tersedia.</p>
                        @endif
                        <div class="mt-4 text-center">
                            <a href="{{ route('venues.index') }}" class="btn btn-primary">Kembali ke Daftar Venue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
