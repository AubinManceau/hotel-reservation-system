<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center">
                        <h1 class="text-3xl">Reservations</h1>
                        <a class="bg-blue-500 text-white p-2 rounded text-center" href="{{ route('reservations.create', $hotel->id) }}">Ajouter une réservation</a>
                    </div>
                    <div class="flex justify-center">
                        <table class="mt-8 border-2 w-[75vw] border-collapse">
                            <thead class="border-2">
                                <tr>
                                    <th class="w-[10%] text-left px-2 border-2">Nom</th>
                                    <th class="w-[10%] text-left px-2 border-2">Prénom</th>
                                    <th class="w-[25%] text-left px-2 border-2">Email</th>
                                    <th class="w-[15%] text-left px-2 border-2">Téléphone</th>
                                    <th class="w-[10%] text-left px-2 border-2">Chambre</th>
                                    <th class="w-[15%] text-left px-2 border-2">Date de début</th>
                                    <th class="w-[15%] text-left px-2 border-2">Date de fin</th>
                                    <th class=" px-2 border-2">Option</th>
                                </tr>
                            </thead>
                            <tbody class="border-collapse">
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td class="px-2 border-2">{{ $reservation->client_firstname }}</td>
                                        <td class="px-2 border-2">{{ $reservation->client_lastname}}</td>
                                        <td class="px-2 border-2">{{ $reservation->client_email }}</td>
                                        <td class="px-2 border-2">{{ $reservation->client_phone }}</td>
                                        <td class="px-2 border-2">{{ $reservation->room_id }}</td>   
                                        <td class="px-2 border-2">{{ $reservation->date_start }}</td>
                                        <td class="px-2 border-2">{{ $reservation->date_end }}</td>
                                        <td class="px-2 border-2 flex flex-col gap-y-1"><a class="bg-orange-500 w-[100%] text-white p-1 rounded text-center" href="{{ route('reservations.edit', $hotel->id) }}">Modifier</a><a class="bg-red-500 w-[100%] text-white p-1 rounded text-center" href="">Supprimer</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>