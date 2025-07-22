<x-admin-app>
    @if(session('success'))
    <p style="color:green" class="m-auto">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('stop.store') }}" class="p-5 ">
        @csrf

        <input type="hidden" name="bucs_id" value="{{ $bus->id }}">
        <h1 class="text-center">Add Stop to Bus ID: {{ $bus->n_bus }}</h1>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Stop Name</label>
                <input type="text" name="name" id="name" placeholder="e.g. Bab Ghemat 2" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div>
                <label for="stop_order" class="block mb-2 text-sm font-medium text-gray-900">Stop Order</label>
                <input type="number" name="stop_order" id="stop_order" placeholder="e.g. 1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>

            <div>
                <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Latitude</label>
                <input type="text" name="latitude" id="latitude" placeholder="31.6325"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>

            <div>
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">Longitude</label>
                <input type="text" value="-" name="longitude" id="longitude" placeholder="-7.9895"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">direction</label>
                <select name="direction" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="retour">Retour</option>
                    <option value="aller">Aller</option>
                </select>
            </div>
        </div>

        <button type="submit"
            class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
            Save Stop
        </button>
    </form>


    <div class="relative overflow-x-auto shadow-md rounded-lg p-5">
        <table class="w-full text-sm text-left text-black-900 dark:text-black-900 rounded-lg">
            <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-yellow-900 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        lon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @forelse($bus->stops->sortByDesc('stop_order') as $stop)
                <tr class="odd:bg-white even:bg-gray-200 text-black-900">
                    <th scope="row" class="px-6 py-4 font-medium text-black-900 whitespace-nowrap dark:text-black">
                        {{$stop->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$stop->stop_order}}
                    </td>
                    <td class="px-6 py-4">
                        {{$stop->latitude}}
                    </td>
                    <td class="px-6 py-4">
                        {{$stop->longitude}}
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('stop.destroy', $stop->id) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet arrêt ?');">
                            @csrf
                            @method('DELETE')
                            <button class="flex items-center gap-1 text-red-600 hover:underline font-medium" type="submit">
                                <!-- Trash Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Supprimer
                            </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr class="odd:bg-white even:bg-gray-200 text-black-900">
                    <td colspan="5" class="text-center py-6">
                        Aucun arrêt disponible pour ce bus.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-app>