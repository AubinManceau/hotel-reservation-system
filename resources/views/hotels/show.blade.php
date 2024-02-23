<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <figure>
                        <img class="w-[40vw]" src="../image/{{ $hotel->image }}">
                    </figure>
                    <div class="w-[30vw] flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between mb-5">
                                <h1 class="font-bold text-xl">{{$hotel->name}}</h1>
                                <p>{{$hotel->location}}</p>
                            </div>
                            <p class="mb-5">{{$hotel->description}}</p>
                            <p>{{$hotel->nb_rooms}} chambres</p>
                            <p>{{$hotel->price}} € / nuit</p>
                        </div>
                        <div>
                            <a class="bg-blue-500 text-white p-2 rounded flex justify-center" href="{{ route('reservations.index', $hotel->id) }}">Voir les réservations</a>
                            <div class="flex justify-between mt-5">
                                <a class="bg-orange-500 w-[48%] text-white p-2 rounded text-center" href="{{ route('hotels.edit', $hotel->id) }}">Modifier les informations</a>
                                <form class="w-[48%]" action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $hotel->id }}" name="id">
                                    <button class="bg-red-500 w-[100%] text-white p-2 rounded" type="submit">Supprimer cet hotel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
