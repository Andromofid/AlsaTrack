<x-admin-app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <!-- Page Heading -->
        <div class="mb-10 text-center">
            <h1 class="text-3xl sm:text-4xl font-bold text-yellow-700">
                Bienvenue sur le Tableau de bord Admin
            </h1>
            <p class="mt-2 text-gray-600 text-base sm:text-lg">
                Gérez les bus, les arrêts et suivez les statistiques de votre réseau de transport.
            </p>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-yellow-100 p-6 rounded-lg shadow text-center">
                <h2 class="text-lg sm:text-xl font-semibold text-yellow-800">Nombre de bus</h2>
                <p class="text-3xl sm:text-4xl font-bold text-black-900 mt-2">{{ $busCount }}</p>
            </div>
            <!-- Add more stat cards here if needed -->
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{route('buses.create')}}"
                class="flex items-center justify-center gap-2 bg-yellow-700 hover:bg-yellow-900 text-white font-bold py-4 px-6 rounded shadow text-center transition">
                <!-- Icon: Plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span class="text-base sm:text-lg">Ajouter un bus</span>
            </a>

            <a href="{{ route('stops.index') }}"
                class="flex items-center justify-center gap-2 bg-black text-white hover:bg-yellow-700 font-bold py-4 px-6 rounded shadow text-center transition">
                <!-- Icon: Map Pin -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.657 16.657L13.414 12.414a4 4 0 00-5.657 0l-4.243 4.243a8 8 0 1011.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="text-base sm:text-lg">Ajouter des arrêts</span>
            </a>
        </div>
    </div>
</x-admin-app>
