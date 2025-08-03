<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bus Tracking - Real-time</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Urbanist Font -->
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        body {
            font-family: 'Urbanist', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <div class="max-w-4xl mx-auto py-6 px-4">
        <h1 class="text-3xl font-bold text-blue-700 mb-2 flex items-center gap-2">
            🚌 Bus Tracking Page #{{$bus->n_bus}}
        </h1>
        <p class="text-lg text-gray-600">
            Ce bus envoie sa position actuelle en temps réel. Ouvrez la page de suivi pour voir le déplacement en direct.
        </p>
    </div>

    <!-- Map Section -->
    <div class="max-w-5xl mx-auto px-4">
        <div id="map" class="w-full h-[500px] rounded-xl shadow-md border border-gray-300"></div>
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
    <!-- Leaflet & Pusher JS (Do not touch) -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>
        let map;
        let busMarker;
        const busId = parseInt('{{$bus->id}}'); // Change this if you track multiple buses

        function initializeMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        let lat = position.coords.latitude;
                        let lon = position.coords.longitude;

                        console.log("Bus Current Location:", lat, lon);

                        // Initialize map centered on bus location
                        map = L.map('map').setView([lat, lon], 13);

                        // Add OpenStreetMap tile layer
                        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                        }).addTo(map);

                        // Add bus marker
                        busMarker = L.marker([lat, lon])
                            .addTo(map)
                            .bindPopup("Bus Location")
                            .openPopup();

                        // Start tracking bus location
                        trackBusLocation();
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
                // alert("Geolocation is not supported by your browser.");
                document.getElementById("geoModal").classList.remove("hidden");
            }
        }

        function trackBusLocation() {
            navigator.geolocation.watchPosition(
                function(position) {
                    let latitude = position.coords.latitude;
                    let longitude = position.coords.longitude;

                    console.log("Sending Bus Location:", latitude, longitude);

                    // Send location to backend
                    console.log(`channel${busId}`);

                    fetch("http://127.0.0.1:8000/api/bus/update-location", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Laravel CSRF token
                        },
                        body: JSON.stringify({
                            bus_id: busId,
                            latitude,
                            longitude
                        }),
                    }).catch(error => console.error("Error sending location:", error));

                    // Update marker position
                    if (busMarker) {
                        busMarker.setLatLng([latitude, longitude]);
                        map.setView([latitude, longitude], 13);
                    }
                },
                function(error) {
                    console.error("Error tracking bus:", error);
                }, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                }
            );
        }

        // Initialize everything
        document.addEventListener("DOMContentLoaded", function() {
            initializeMap();
        });
    </script>

</body>

</html>