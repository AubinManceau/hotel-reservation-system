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
                    <div class="p-6 text-gray-900 flex justify-between">
                        <figure>
                            <img class="w-[40vw]" src="{{$hotel->image}}">
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
                                <a class="bg-blue-500 text-white p-2 rounded flex justify-center" href="{{ route('welcome.create', $hotel->id) }}">Réserver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>