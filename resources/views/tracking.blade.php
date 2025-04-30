<x-app>
    <div class="max-w-5xl mx-auto text-center my-8">
        <h1 class="text-4xl font-bold text-blue-700">Suivi du Bus #{{ $bus->n_bus }}</h1>
        <p class="text-gray-600 text-lg mt-2">
            Suivez en temps réel la position du bus numéro <span class="font-semibold text-blue-600">{{ $bus->n_bus }}</span>.
        </p>
    </div>

    <!-- Map Container -->
    <div class="flex justify-center">
        <div id="map" class="w-[90%] md:w-[50%] h-[500px] rounded-lg shadow-lg border border-gray-300"></div>
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
                        alert("Unable to retrieve your location.");
                    }, {
                        enableHighAccuracy: true,
                        timeout: 5000,
                        maximumAge: 0
                    }
                );
            } else {
                alert("Geolocation is not supported by your browser.");
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
            console.log(`channel{{$bus->id}}`);
            channel.bind(`event`, function(data) {
                console.log("Received update:", data);
                let busId = data.bus_id;
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
                        .bindPopup(`Bus ${busId}`);
                }

                // Get and update the fastest route
                // updateFastestRoute(busId, latitude, longitude);
            });
        }

        function stops() {
            stopCoordinates.forEach(stop => {
                if (stop.latitude && stop.longitude) {
                    let latLng = [parseFloat(stop.latitude), parseFloat(stop.longitude)];
                    routePoints.push(latLng);
                    // Optional: marker for each stop
                    L.marker([parseFloat(stop.latitude), parseFloat(stop.longitude)],{icon:stopIcon}).addTo(map).bindPopup(stop.name);
                }
            });
            let stopLine = L.polyline(routePoints, {
                color: 'blue',
                weight: 4,
                opacity: 0.8
            }).addTo(map);

            // Auto-zoom to show the whole route
            map.fitBounds(stopLine.getBounds());
            // console.log(routePoints);
        }
        // Function to get and display the fastest route using OSRM
        // function updateFastestRoute(busId, busLat, busLon) {
        //     if (userMarker) {
        //         let userLatLng = userMarker.getLatLng();
        //         let busLatLng = L.latLng(busLat, busLon);

        //         // OSRM Routing API (no API key required)
        //         const osrmRouteUrl = `https://router.project-osrm.org/route/v1/driving/${userLatLng.lng},${userLatLng.lat};${busLon},${busLat}?overview=full&geometries=geojson`;

        //         fetch(osrmRouteUrl)
        //             .then(response => response.json())
        //             .then(data => {
        //                 if (data.routes && data.routes.length > 0) {
        //                     let routeCoordinates = data.routes[0].geometry.coordinates.map(coord => [coord[1], coord[0]]);

        //                     // If a route for this bus already exists, update it
        //                     if (busRoutes[busId]) {
        //                         busRoutes[busId].setLatLngs(routeCoordinates);
        //                     } else {
        //                         // Create a new route line
        //                         busRoutes[busId] = L.polyline(routeCoordinates, {
        //                             color: "blue", // Route color
        //                             weight: 5, // Line thickness
        //                             opacity: 0.8, // Transparency
        //                         }).addTo(map);
        //                     }
        //                 }
        //             })
        //             .catch(error => {
        //                 console.error("Error fetching route:", error);
        //             });
        //     }
        // }

        // Initialize everything
        document.addEventListener("DOMContentLoaded", function() {
            initializeMap();
            getbuslocation();
        });
    </script>
</x-app>