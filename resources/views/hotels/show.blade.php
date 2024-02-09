<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <figure>
                        <img class="w-[40vw]" src="{{$hotel->image}}" alt="">
                    </figure>
                    <div class="w-[30vw] flex flex-col">
                        <div class="flex justify-between mb-5">
                            <h1 class="font-bold text-xl">{{$hotel->name}}</h1>
                            <p>{{$hotel->location}}</p>
                        </div>
                        <p class="mb-5">{{$hotel->description}}</p>
                        <p>{{$hotel->nb_rooms}} chambres</p>
                        <p>{{$hotel->price}} € / nuit</p>
                        <a class="bg-blue-500 text-white p-2 rounded text-center my-4" href="">Reserver</a>
                        <div class="flex gap-6">
                            <a class="bg-orange-500 text-white p-2 rounded" href="">Modifier les informations</a>
                            <a class="bg-red-500 text-white p-2 rounded" href="">Supprimer cet hôtel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
