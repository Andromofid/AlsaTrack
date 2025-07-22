<x-app>
    <!-- Header Section -->
    <div class="relative w-full h-[90vh] flex flex-col lg:flex-row items-center bg-gray-100 px-6 sm:px-10">
        <!-- Left Side: Text -->
        <div class="w-full lg:w-1/2 text-center lg:text-left">
            <p class="text-yellow-800 text-4xl sm:text-6xl font-extrabold leading-tight">
                Bienvenue
            </p>
            <p class="text-gray-900 text-2xl sm:text-4xl font-bold mt-2">
                sur votre plateforme de suivi des bus en temps réel !
            </p>
            <p class="text-gray-700 text-lg sm:text-xl mt-4">
                Consultez les horaires, suivez votre bus en direct, et obtenez toutes les informations sur le réseau de transport de Marrakech.
            </p>

            <!-- Commencer Button (Scroll to #start) -->
            <div class="mt-6 w-full flex justify-start">
                <a
                    class="bg-yellow-700 flex items-center justify-center px-8 md:w-[200px] w-full text-white text-lg sm:text-xl font-semibold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-800 transition duration-300"
                    onclick="document.getElementById('start').scrollIntoView({ behavior: 'smooth' });">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.1 2 5 5.1 5 9c0 3.9 5.1 10.3 6.4 11.8.3.3.7.5 1.1.5s.8-.2 1.1-.5C13.9 19.3 19 12.9 19 9c0-3.9-3.1-7-7-7zm0 17.3C10.1 17 7 12.9 7 9c0-2.8 2.2-5 5-5s5 2.2 5 5c0 3.9-3.1 8-5 10.3zM12 5C9.8 5 8 6.8 8 9s1.8 4 4 4 4-1.8 4-4-1.8-4-4-4zm0 6c-1.1 0-2-1-2-2s.9-2 2-2 2 1 2 2-.9 2-2 2z"></path>
                    </svg>
                    Commencer
                </a>
            </div>



        </div>

        <!-- Right Side: Background Image -->
        <div class="w-full lg:w-1/2 h-60 lg:h-full bg-cover bg-center mt-6 lg:mt-0"
            style="background-image: url('{{ asset('header.jpg') }}');">
        </div>
    </div>

    <!-- Bus Selection Section -->
    <div class="text-center py-6" id="start">
        <h1 class="text-3xl font-bold text-yellow-700">Choisissez votre bus</h1>
        <p class="text-gray-600 text-lg mt-2">
            Sélectionnez un bus pour voir son itinéraire et suivre son emplacement en temps réel.
        </p>
    </div>

    <div class="max-w-4xl mx-auto p-4">
        <div class=" grid grid-cols-2  md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6">
            @foreach($bus->sortBy('n_bus') as $bu)
            <a href="{{route('bus.track',$bu->id) }}"
                class="mx-auto flex flex-col items-center justify-center h-20 w-20 sm:h-24 sm:w-24 bg-yellow-700 text-white text-lg sm:text-xl font-bold rounded-lg shadow-md cursor-pointer hover:bg-yellow-900 transition duration-300">
                <!-- Bus Icon -->
                <svg class="w-6 h-6 sm:w-8 sm:h-8 mb-1" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 3H6C3.8 3 2 4.8 2 7V16C2 17.1 2.9 18 4 18V20C4 20.6 4.4 21 5 21H7C7.6 21 8 20.6 8 20V18H16V20C16 20.6 16.4 21 17 21H19C19.6 21 20 20.6 20 20V18C21.1 18 22 17.1 22 16V7C22 4.8 20.2 3 18 3ZM6 5H18C19.1 5 20 5.9 20 7V8H4V7C4 5.9 4.9 5 6 5ZM18 14H6C5.4 14 5 13.6 5 13V10H19V13C19 13.6 18.6 14 18 14Z"></path>
                </svg>
                <!-- Bus Number -->
                {{ $bu->n_bus }}
            </a>
            @endforeach
        </div>
    </div>

</x-app>