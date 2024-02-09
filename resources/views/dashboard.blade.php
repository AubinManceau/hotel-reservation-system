<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between flex-wrap">
                    @foreach ($hotels as $hotel)
                        <a href="{{ route('hotels.show', $hotel->id) }}">
                            <figure>
                                <img class="w-[23vw]" src="{{ $hotel->image }}">
                            </figure>
                            <div>
                                <h1 class="text-xl font-bold">{{ $hotel->name }}</h1>
                                <p class="text-sm">{{ $hotel->description }}</p>
                                <p class="text-sm">{{ $hotel->price }} € / nuit</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
