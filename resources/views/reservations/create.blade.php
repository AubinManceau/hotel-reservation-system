<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('reservations.store', $hotel->id) }}" method="POST" class="flex flex-col w-[100%]">
                        @csrf
                        <input placeholder="Nom du client" type="text" name="client_lastname" id="client_lastname" class="w-[50%] p-1 border border-gray-400">

                        <input placeholder="Prénom du client" type="text" name="client_firstname" id="client_firstname" class="w-[50%] p-1 border border-gray-400 resize-none">

                        <input placeholder="Email du client" type="email" name="client_email" id="client_email" class="w-[50%] p-1 border border-gray-400">

                        <input placeholder="Téléphone du client" type="phone" name="client_phone" id="client_phone" class="w-[50%] p-1 border border-gray-400">

                        <input placeholder="Numéro de la chambre" type="text" name="room_id" id="room_id" class="w-[50%] p-1 border border-gray-400">

                        <input placeholder="Date d'arrivée" type="date" name="date_start" id="date_start" class="w-[50%] p-1 border border-gray-400">

                        <input placeholder="Date de départ" type="date" name="date_end" id="date_end" class="w-[50%] p-1 border border-gray-400">

                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                        <button type="submit" class="w-[50%] p-1 mt-7 bg-blue-500 text-white">Ajouter une réservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>