<x-app>
    <section class="relative h-[90vh] bg-cover bg-center flex flex-col justify-center items-center px-6 sm:px-10" style="background-image: url('{{ asset('header3.jpg') }}');background-size: cover;background-position: center;">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 text-center text-white max-w-3xl">
            <!-- Heading & Description -->
            <p class="text-yellow-200 text-4xl sm:text-6xl font-extrabold leading-tight">
                Bienvenue
            </p>
            <p class="text-white text-2xl sm:text-4xl font-bold mt-2">
                sur votre plateforme de suivi des bus en temps réel !
            </p>
            <p class="text-white text-lg sm:text-xl mt-4">
                Consultez les horaires, suivez votre bus en direct, et obtenez toutes les informations sur le réseau de transport de Marrakech.
            </p>

            <!-- Search Method Selection -->
            <div class="mt-10 w-full max-w-xl mx-auto">
                <div class="flex justify-center mb-4 gap-2">
                    <button type="button" id="search-by-number-btn"
                        class="px-5 py-2 w-[50%] bg-white/70 rounded-lg border-none text-yellow-700 font-semibold shadow-sm transition-colors duration-200 focus:outline-none focus:border-b-4 focus:border-yellow-700"
                        style="border-bottom: 4px solid {{ (!request('debut') && !request('jusqua')) ? '#b45309' : 'transparent' }};">
                        Par numéro
                    </button>
                    <button type="button" id="search-by-route-btn"
                        class="px-5 py-2 w-[50%] bg-white/70 rounded-lg border-none text-yellow-700 font-semibold shadow-sm transition-colors duration-200 focus:outline-none focus:border-b-4 focus:border-yellow-700"
                        style="border-bottom: 4px solid {{ (request('debut') || request('jusqua')) ? '#b45309' : 'transparent' }};">
                        Par itinéraire
                    </button>
                </div>
                <!-- Search by Number Form -->
                <form action="{{route('home')}}" method="GET" id="bus-search-form" class="bg-white rounded-lg shadow-lg overflow-hidden" style="display: block;">
                    <div class="flex items-center gap-2 px-4 py-3">
                        <div class="relative w-full">
                            <input type="number" value="{{$bus??''}}" name="bus" id="bus-input" placeholder="Numéro du bus"
                                class="w-full px-4 py-3 text-gray-800 text-base rounded-lg border border-gray-300 focus:border-yellow-700 focus:ring-2 focus:ring-yellow-200 outline-none transition-all duration-200 bg-gray-50" />
                        </div>
                        <button type="submit"
                            class="bg-yellow-700 hover:bg-yellow-900 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                            Rechercher
                        </button>
                    </div>
                </form>
                <!-- Search by Route Form -->
                <form action="{{route('home')}}" method="GET" id="route-search-form" class="bg-white rounded-lg shadow-lg overflow-hidden mt-4" style="display: none;">
                    <div class="flex flex-col sm:flex-row items-center gap-2 px-4 py-3">
                        <div class="relative w-full sm:w-1/2">
                            <input type="text" name="debut" id="debut-input" placeholder="Début"
                                class="w-full px-4 py-3 text-gray-800 text-base rounded-lg border border-gray-300 focus:border-yellow-700 focus:ring-2 focus:ring-yellow-200 outline-none transition-all duration-200 bg-gray-50" />
                        </div>
                        <div class="relative w-full sm:w-1/2">
                            <input type="text" name="jusqua" id="jusqua-input" placeholder="Jusqu'à"
                                class="w-full px-4 py-3 text-gray-800 text-base rounded-lg border border-gray-300 focus:border-yellow-700 focus:ring-2 focus:ring-yellow-200 outline-none transition-all duration-200 bg-gray-50" />
                        </div>
                        <button type="submit"
                            class="bg-yellow-700 hover:bg-yellow-900 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                            Rechercher
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>


    <!-- Bus Selection Section -->
    <div class="text-center py-6 mt-5 " id="start">
        <h1 class="text-yellow-800 text-xl sm:text-4xl font-extrabold leading-tight">Choisissez votre bus</h1>
        <p class="text-gray-600 text-xl mt-2">
            Sélectionnez un bus pour voir son itinéraire et suivre son emplacement en temps réel.
        </p>
    </div>

    <div class="max-w-4xl mx-auto p-4">
        <div id="bus-grid"
            class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6 ">
            @foreach($buses->sortBy('n_bus') as $index => $bu)
            <a
                href="{{ route('bus.track', $bu->id) }}"
                class="bus-card opacity-0 translate-y-6 transition-all duration-700 ease-in-out mx-auto flex flex-col items-center justify-center h-20 w-20 sm:h-24 sm:w-24 bg-yellow-700 text-white text-lg sm:text-xl font-bold rounded-lg shadow-md cursor-pointer hover:bg-yellow-900"
                style="transition-delay: {{ $bu->id * 10 }}ms;">
                <svg class="w-6 h-6 sm:w-8 sm:h-8 mb-1" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 3H6C3.8 3 2 4.8 2 7V16C2 17.1 2.9 18 4 18V20C4 20.6 4.4 21 5 21H7C7.6 21 8 20.6 8 20V18H16V20C16 20.6 16.4 21 17 21H19C19.6 21 20 20.6 20 20V18C21.1 18 22 17.1 22 16V7C22 4.8 20.2 3 18 3ZM6 5H18C19.1 5 20 5.9 20 7V8H4V7C4 5.9 4.9 5 6 5ZM18 14H6C5.4 14 5 13.6 5 13V10H19V13C19 13.6 18.6 14 18 14Z"></path>
                </svg>

                <!-- Number -->
                {{ $bu->n_bus }}
            </a>
            @endforeach
        </div>
    </div>

    @if(!empty($bus))
    <script>
        window.onload = function() {
            var bus_grid = document.getElementById('bus-grid');
            if (bus_grid) {
                bus_grid.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        };
        document.getElementById('bus-search-form').addEventListener('submit', function(e) {
            var busInput = document.getElementById('bus-input');
            if (!busInput.value.trim()) {
                e.preventDefault();
                busInput.classList.add('border', 'border-red-500', 'bg-red-100');
                busInput.focus();
            } else {
                busInput.classList.remove('border', 'border-red-500', 'bg-red-100');
            }
        });

        document.getElementById('search-by-number-btn').onclick = function() {
            document.getElementById('bus-search-form').style.display = 'block';
            document.getElementById('route-search-form').style.display = 'none';
            this.style.borderBottom = '4px solid #b45309';
            document.getElementById('search-by-route-btn').style.borderBottom = '4px solid transparent';
        };
        document.getElementById('search-by-route-btn').onclick = function() {
            document.getElementById('bus-search-form').style.display = 'none';
            document.getElementById('route-search-form').style.display = 'block';
            this.style.borderBottom = '4px solid #b45309';
            document.getElementById('search-by-number-btn').style.borderBottom = '4px solid transparent';
        };
    </script>
    @else
    <script>
        document.getElementById('bus-search-form').addEventListener('submit', function(e) {
            var busInput = document.getElementById('bus-input');
            if (!busInput.value.trim()) {
                e.preventDefault();
                busInput.classList.add('border', 'border-red-500', 'bg-red-100');
                busInput.focus();
            } else {
                busInput.classList.remove('border', 'border-red-500', 'bg-red-100');
            }
        });

        document.getElementById('search-by-number-btn').onclick = function() {
            document.getElementById('bus-search-form').style.display = 'block';
            document.getElementById('route-search-form').style.display = 'none';
            this.style.borderBottom = '4px solid #b45309';
            document.getElementById('search-by-route-btn').style.borderBottom = '4px solid transparent';
        };
        document.getElementById('search-by-route-btn').onclick = function() {
            document.getElementById('bus-search-form').style.display = 'none';
            document.getElementById('route-search-form').style.display = 'block';
            this.style.borderBottom = '4px solid #b45309';
            document.getElementById('search-by-number-btn').style.borderBottom = '4px solid transparent';
        };
    </script>
    @endif
</x-app>