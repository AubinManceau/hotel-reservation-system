<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-100">
        <div>
            @if (Route::has('login'))
                <div class=" p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-600">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-600">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form action="{{ route('welcome.store', $hotel->id) }}" method="POST" class="flex flex-col w-[100%]">
                            @csrf

                            @if($errors->has('client_lastname'))
                                <p class="text-red-500">Veuillez vérifier le champ "Nom du client"</p>
                            @endif
                            <input value="{{ old('client_lastname') }}" placeholder="Nom du client" type="text" name="client_lastname" id="client_lastname" class="w-[50%] p-1 border border-gray-400">

                            @if($errors->has('client_firstname'))
                                <p class="text-red-500">Veuillez vérifier le champ "Prénom du client"</p>
                            @endif
                            <input value="{{ old('client_firstname') }}" placeholder="Prénom du client" type="text" name="client_firstname" id="client_firstname" class="w-[50%] p-1 border border-gray-400 resize-none">

                            @if($errors->has('client_email'))
                                <p class="text-red-500">Veuillez vérifier le champ "Email du client"</p>
                            @endif
                            <input value="{{ old('client_email') }}" placeholder="Email du client" type="email" name="client_email" id="client_email" class="w-[50%] p-1 border border-gray-400">

                            @if($errors->has('client_phone'))
                                <p class="text-red-500">Veuillez vérifier le champ "Téléphone du client"</p>
                            @endif
                            <input value="{{ old('client_phone') }}" placeholder="Téléphone du client" type="phone" name="client_phone" id="client_phone" class="w-[50%] p-1 border border-gray-400">

                            @if($errors->has('room_id'))
                                <p class="text-red-500">Veuillez vérifier le champ "Numéro de chambre"</p>
                            @endif
                            <select name="room_id" id="room_id" class="w-[50%] p-1 border border-gray-400">
                                <option value="">-- Choisissez une chambre --</option>
                                @for ($i = 1; $i <= $hotel->nb_rooms; $i++)
                                    <option value="{{ $i }}" {{ old('room_id') == $i ? 'selected' : '' }}>Chambre n°{{ $i }}</option>
                                @endfor
                            </select>

                            @if($errors->has('date_start'))
                                <p class="text-red-500">Veuillez vérifier le champ "Date d'arrivée'"</p>
                            @endif
                            <input value="{{ old('date_start') }}" placeholder="Date d'arrivée" type="date" name="date_start" id="date_start" class="w-[50%] p-1 border border-gray-400">

                            @if($errors->has('date_end'))
                                <p class="text-red-500">Veuillez vérifier le champ "Date de départ"</p>
                            @endif
                            <input value="{{ old('date_end') }}" placeholder="Date de départ" type="date" name="date_end" id="date_end" class="w-[50%] p-1 border border-gray-400">

                            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                            <button type="submit" class="w-[50%] p-1 mt-7 bg-blue-500 text-white">Confirmer la réservation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
