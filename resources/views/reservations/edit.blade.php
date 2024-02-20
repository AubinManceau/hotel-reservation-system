<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('reservations.update', ['id' => $hotel->id, 'id_reservation' => $reservations->id_reservation]) }}" method="POST" class="flex flex-col w-[100%]">
                        @csrf
                        @method('PUT')
                        
                        @if($errors->has('client_lastname'))
                            <p class="text-red-500">Veuillez vérifier le champ "Nom du client"</p>
                        @endif
                        <input placeholder="Nom du client" type="text" name="client_lastname" id="client_lastname" class="w-[50%] p-1 border border-gray-400" value="{{ $reservations->client_lastname }}">

                        @if($errors->has('client_firstname'))
                            <p class="text-red-500">Veuillez vérifier le champ "Prénom du client"</p>
                        @endif
                        <input placeholder="Prénom du client" type="text" name="client_firstname" id="client_firstname" class="w-[50%] p-1 border border-gray-400 resize-none" value="{{ $reservations->client_firstname }}">

                        @if($errors->has('client_email'))
                            <p class="text-red-500">Veuillez vérifier le champ "Email du client"</p>
                        @endif
                        <input placeholder="Email du client" type="email" name="client_email" id="client_email" class="w-[50%] p-1 border border-gray-400" value="{{ $reservations->client_email }}">

                        @if($errors->has('client_phone'))
                            <p class="text-red-500">Veuillez vérifier le champ "Téléphone du client"</p>
                        @endif
                        <input placeholder="Téléphone du client" type="phone" name="client_phone" id="client_phone" class="w-[50%] p-1 border border-gray-400" value="{{ $reservations->client_phone }}">

                        @if($errors->has('room_id'))
                            <p class="text-red-500">Veuillez vérifier le champ "Numéro de chambre"</p>
                        @endif
                        <select name="room_id" id="room_id" class="w-[50%] p-1 border border-gray-400">
                            <option value="">-- Choisissez une chambre --</option>
                            @for ($i = 1; $i <= $hotel->nb_rooms; $i++)
                                <option value="{{ $i }}" {{ $reservations->room_id == $i ? 'selected' : '' }}>Chambre n°{{ $i }}</option>
                            @endfor
                        </select>

                        @if($errors->has('date_start'))
                            <p class="text-red-500">Veuillez vérifier le champ "Date d'arrivée'"</p>
                        @endif
                        <input placeholder="Date d'arrivée" type="date" name="date_start" id="date_start" class="w-[50%] p-1 border border-gray-400" value="{{ $reservations->date_start }}">

                        @if($errors->has('date_end'))
                            <p class="text-red-500">Veuillez vérifier le champ "Date de départ"</p>
                        @endif
                        <input placeholder="Date de départ" type="date" name="date_end" id="date_end" class="w-[50%] p-1 border border-gray-400" value="{{ $reservations->date_end }}">

                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                        <button type="submit" class="w-[50%] p-1 mt-7 bg-blue-500 text-white">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
