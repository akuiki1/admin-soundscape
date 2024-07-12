@extends('components.layout')

@section('content')
    @include('partials._hero')
    @include('partials._search')

    <div class="card-body p-3">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                        <div class="position-relative">
                            <a class="d-block shadow-xl border-radius-xl">
                                <img src="{{ asset($event->photo) }}" alt="img-blur-shadow"
                                    class="img-fluid shadow border-radius-xl" style="width: 100%; height:200px;">
                            </a>
                        </div>
                        <div class="card-body px-1 pb-0">
                            <div class="mb-3">
                                <a href="{{ route('events.index') }}"
                                    class="text-gradient text-dark mb-2 text-xl">{{ $event->name }}</a>
                            </div>
                            <div class="mr-1 flex justify-between items-center">
                                <div class="flex flex-col">
                                    <p class="mb-1 text-sm flex items-center">
                                        <i class="fa fa-calendar-alt mr-2"></i> 
                                        {{ $event->date->format('d F Y') }}
                                    </p>
                                    <p class="mb-1 text-sm flex items-center">
                                        <i class="fa fa-map-marker-alt mr-2"></i>
                                        {{ Str::limit($event->venue->address, 100) }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('events-user.show', $event->id) }}"
                                       class="text-white rounded-lg bg-orange-500 hover:bg-orange-700 px-4 py-2 shadow-md transform hover:-translate-y-1 hover:scale-105 text-decoration-none">
                                       Detail
                                    </a>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
