<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('hotels.store') }}" method="POST" class="flex flex-col w-[100%]">
                        @csrf
                        <label for="name">Nom de l'hôtel</label>
                        <input type="text" name="name" id="name" class="w-[50%] p-2 border border-gray-400">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="w-[50%] p-2 border border-gray-400"></textarea>
                        <label for="location">Lieu</label>
                        <input type="text" name="location" id="location" class="w-[50%] p-2 border border-gray-400">
                        <label for="image">Image de couverture</label>
                        <input type="text" name="image" id="image" class="w-[50%] p-2 border border-gray-400">
                        <label for="nb_rooms">Nombre de chambres</label>
                        <input type="text" name="nb_rooms" id="nb_rooms" class="w-[50%] p-2 border border-gray-400">
                        <label for="price">Prix</label>
                        <input type="text" name="price" id="price" class="w-[50%] p-2 border border-gray-400">
                        <button type="submit" class="w-[50%] p-2 mt-7 bg-blue-500 text-white">Ajouter un hôtel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
