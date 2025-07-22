<x-admin-app>
    @if(session('success'))
    <p class="text-green-600 text-center my-4">{{ session('success') }}</p>
    @endif

    
    <div class="text-center py-6" id="start">
        <h1 class="text-3xl font-bold text-yellow-700"> 🚌 Liste des bus</h1>
        <p class="text-black-900 text-lg mt-2">
            Sélectionnez un bus pour voir son arrêts et suivre son emplacement.
        </p>
    </div>
    <!-- Tableau des bus -->
    <div class="relative overflow-x-auto shadow-md rounded-lg p-5">
        <table class="w-full text-sm text-left text-black-900 dark:text-black-900 rounded-lg">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-yellow-900 dark:text-white">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Numéro du bus</th>
                    <th class="px-6 py-3">Date de création</th>
                    <th class="px-6 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($buses as $bus)
                <tr class="odd:bg-white even:bg-gray-200 text-black-900">
                    <td class="px-6 py-4 font-medium ">{{ $bus->id }}</td>
                    <td class="px-6 py-4">{{ $bus->n_bus }}</td>
                    <td class="px-6 py-4">{{ $bus->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('stop.create', ['bucs_id' => $bus->id]) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-yellow-700 text-white text-xs font-semibold rounded-md hover:bg-yellow-800">
                            Ajouter des arrêts
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500 dark:text-gray-300">
                        Aucun bus disponible.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-app>