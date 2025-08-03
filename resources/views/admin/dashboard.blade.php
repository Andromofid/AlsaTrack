<x-admin-app>
    <!-- Hero Section with Background -->
    <section class="relative h-[30vh] bg-cover bg-center flex items-center justify-center text-center px-4"
        style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.7)), url('{{ asset('header3.jpg') }}');">
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative z-10 max-w-3xl text-white">
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Tableau de Bord Administrateur</h1>
            <p class="text-lg sm:text-xl">
                Surveillez, gérez et améliorez votre réseau de transport en temps réel.
            </p>
        </div>
    </section>

    <!-- Main Dashboard Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16">


        <!-- Stat Cards -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <div class="bg-yellow-100 p-6 rounded-lg shadow text-center">
                <h3 class="text-lg sm:text-xl font-semibold text-yellow-800">Nombre de bus</h3>
                <p class="text-3xl sm:text-4xl font-bold text-black-900 mt-2">{{ $busCount }}</p>
            </div>

            <!-- Add more stat cards here -->
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16 mt-10">
            <a href="{{ route('buses.index') }}"
                class="bg-white shadow rounded-lg p-6 hover:bg-yellow-50 transition">
                <h4 class="text-xl font-semibold text-yellow-800 mb-2">Liste des bus</h4>
                <p class="text-gray-600">Afficher, modifier ou supprimer les bus existants.</p>
            </a>
            <a href="{{ route('stops.index') }}"
                class="bg-white shadow rounded-lg p-6 hover:bg-yellow-50 transition">
                <h4 class="text-xl font-semibold text-yellow-800 mb-2">Liste des arrêts</h4>
                <p class="text-gray-600">Afficher les arrêts pour chaque bus et ajouter de nouveaux points.</p>
            </a>
            <a href="#"
                class="bg-white shadow rounded-lg p-6 hover:bg-yellow-50 transition">
                <h4 class="text-xl font-semibold text-yellow-800 mb-2">Statistiques</h4>
                <p class="text-gray-600">Visualisez les performances et l'utilisation du réseau.</p>
            </a>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('buses.create') }}"
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