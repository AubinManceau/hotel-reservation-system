<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('hotels.store') }}" method="POST" class="flex flex-col w-[100%]">
                        @csrf

                        @if($errors->has('name'))
                            <p class="text-red-500">Veuillez vérifier le champ "Nom de l'hôtel"</p>
                        @endif
                        <input value="{{ old('name') }}" placeholder="Nom de l'hôtel" type="text" name="name" id="name" class="w-[50%] p-1 border border-gray-400">

                        @if($errors->has('description'))
                            <p class="text-red-500">Veuillez vérifier le champ "Description"</p>
                        @endif
                        <textarea placeholder="Description" name="description" id="description" class="w-[50%] p-1 border border-gray-400 resize-none">{{ old('description') }}</textarea>

                        @if($errors->has('location'))
                            <p class="text-red-500">Veuillez vérifier le champ "Lieu de l'hôtel"</p>
                        @endif
                        <input value="{{ old('location') }}" placeholder="Lieu de l'hôtel" type="text" name="location" id="location" class="w-[50%] p-1 border border-gray-400">

                        @if($errors->has('image'))
                            <p class="text-red-500">Veuillez vérifier le champ "Url de l'image"</p>
                        @endif
                        <input value="{{ old('image') }}" placeholder="Url de l'image" type="text" name="image" id="image" class="w-[50%] p-1 border border-gray-400">

                        @if($errors->has('nb_rooms'))
                            <p class="text-red-500">Veuillez vérifier le champ "Nombre de chambres"</p>
                        @endif
                        <input value="{{ old('nb_rooms') }}" placeholder="Nombre de chambres" type="text" name="nb_rooms" id="nb_rooms" class="w-[50%] p-1 border border-gray-400">

                        @if($errors->has('price'))
                            <p class="text-red-500">Veuillez vérifier le champ "Prix d'une nuit"</p>
                        @endif
                        <input value="{{ old('price') }}" placeholder="Prix d'une nuit" type="text" name="price" id="price" class="w-[50%] p-1 border border-gray-400">
                        
                        <button type="submit" class="w-[50%] p-1 mt-7 bg-blue-500 text-white">Ajouter un hôtel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
