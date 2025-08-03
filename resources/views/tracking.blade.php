<x-app>
    <div class="max-w-5xl mx-auto text-center my-8 mt-20">
        <h1 class="text-4xl font-bold text-black-900">Suivi du Bus numéro <span class="font-semibold text-yellow-700">{{ $bus->n_bus }}</span></h1>
        <p class="text-black-900 text-lg mt-2">
            Suivez en temps réel la position du bus .
        </p>

    </div>
    <div class="mx-4 sm:mx-auto max-w-full sm:max-w-fit text-center font-semibold text-white bg-yellow-700 px-4 py-2 rounded mb-4 shadow-md text-sm sm:text-base">
        🚌 Affichage des itinéraires :
        <span class="text-blue-200">Aller (bleu)</span>,
        <span class="text-red-200">Retour (rouge)</span>
    </div>


    <!-- Map Container -->
    <div class="flex justify-center">
        <div id="map" class="w-[90%] md:w-[50%] h-[500px] rounded-lg shadow-lg border border-gray-300"></div>
    </div>


    <!-- Geolocation Modal -->
    <div id="geoModal" class="fixed inset-0 bg-black/50 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-[90%] max-w-md p-6 text-center">
            <h2 class="text-xl font-bold text-yellow-700 mb-4">Autorisation de localisation requise</h2>
            <p class="text-gray-700 mb-6">
                Pour utiliser cette fonctionnalité, veuillez activer la géolocalisation sur votre appareil.
            </p>
            <button id="retryGeoBtn"
                class="bg-yellow-700 hover:bg-yellow-800 text-white px-6 py-2 rounded-lg font-semibold transition">
                Réessayer
            </button>
        </div>
    </div>

    <!-- Leaflet & Pusher JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        let map;
        let userMarker;
        let busMarkers = {}; // Store markers for multiple buses
        let busRoutes = {}; // Store polylines for each bus
        let stopCoordinates = @json($bus->stops->sortBy('stop_order')->values());
        let routePoints = [];
        let aller = [];
        let retour = [];


        const busId = parseInt('{{$bus->id}}');
        // Initialize the map with user's location
        function initializeMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        let userLat = position.coords.latitude;
                        let userLon = position.coords.longitude;
                        console.log("User's Location:", userLat, userLon);

                        // Initialize map centered on user's location
                        map = L.map('map').setView([userLat, userLon], 13);

                        // Add OpenStreetMap tile layer
                        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http: //www.openstreetmap.org/copyright">OpenStreetMap</a>',
                        }).addTo(map);

                        // Add user location marker
                        userMarker = L.marker([userLat, userLon])
                            .addTo(map)
                            .bindPopup("Ma position")
                            .openPopup();
                        stops();
                    },
                    function(error) {
                        console.error("Error getting location:", error);
                        document.getElementById("geoModal").classList.remove("hidden");
                    }, {
                        enableHighAccuracy: true,
                        timeout: 5000,
                        maximumAge: 0
                    }
                );
            } else {
                document.getElementById("geoModal").classList.remove("hidden");
            }
        }

        // Define custom bus icon
        const busIcon = L.icon({
            iconUrl: '{{ asset("bus.png") }}',
            iconSize: [30, 30], // Size of the icon
            iconAnchor: [25, 25], // Center the icon
            popupAnchor: [0, -10] // Adjust popup position
        });
        const stopIcon = L.icon({
            iconUrl: '{{ asset("bus-stop.png") }}',
            iconSize: [10, 10], // Size of the icon
            iconAnchor: [12, 12], // Center the icon
            popupAnchor: [0, 0] // Adjust popup position
        });

        function getbuslocation() {
            Pusher.logToConsole = true;
            var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
                cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
                wsHost: "{{ env('PUSHER_HOST') }}",
                wsPort: "{{ env('PUSHER_PORT') }}",
                forceTLS: false,
                disableStats: true
            });

            var channel = pusher.subscribe(`channel{{$bus->id}}`);
            channel.bind(`event`, function(data) {
                console.log("Received update:", data);
                let busId = data.bus_id;
                let n_bus = data.num_bus;
                let latitude = parseFloat(data.latitude);
                let longitude = parseFloat(data.longitude);

                // If marker for this bus exists, update its location
                if (busMarkers[busId]) {
                    busMarkers[busId].setLatLng([latitude, longitude]);
                } else {
                    // Create a new marker for this bus
                    busMarkers[busId] = L.marker([latitude, longitude], {
                            icon: busIcon
                        })
                        .addTo(map)
                        .bindPopup(`Bus ${n_bus}`);
                }

                // Get and update the fastest route
                // updateFastestRoute(busId, latitude, longitude);
            });
        }

        function stops() {
            const aller = [];
            const retour = [];

            stopCoordinates.forEach(stop => {
                if (stop.latitude && stop.longitude) {
                    const latLng = [parseFloat(stop.latitude), parseFloat(stop.longitude)];

                    if (stop.direction === 'aller') {
                        aller.push(latLng);
                    } else {
                        retour.push(latLng);
                    }

                    // Marker for each stop
                    L.marker(latLng, {
                        icon: stopIcon
                    }).addTo(map).bindPopup(stop.name);
                }
            });

            // Draw lines for both directions
            const allerstopLine = L.polyline(aller, {
                color: 'blue',
                weight: 4,
                opacity: 0.8
            }).addTo(map);

            const retourstopLine = L.polyline(retour, {
                color: 'red',
                weight: 4,
                opacity: 0.8
            }).addTo(map);

            // Zoom to fit both routes
            let bounds = L.latLngBounds([]);
            if (aller.length) bounds.extend(allerstopLine.getBounds());
            if (retour.length) bounds.extend(retourstopLine.getBounds());

            map.fitBounds(bounds);
        }


        // Initialize everything
        document.addEventListener("DOMContentLoaded", function() {
            initializeMap();
            getbuslocation();
        });
        document.getElementById('retryGeoBtn').addEventListener('click', function() {
            document.getElementById('geoModal').classList.add('hidden');
            initializeMap(); // Try again
        });
    </script>
</x-app>