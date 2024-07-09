@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $listing->event_banner ? asset('storage/' . $listing->event_banner) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->organizer }}</div>

            <div class="text-lg mt-4 flex items-center">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                <a href="/listings/3" class="ml-60 bg-orange-500 text-white py-2 px-4 rounded-x1 hover:bg-orange-600">
                    View Detail
                </a>
            </div>
        </div>
    </div>
</x-card>
