<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BusTrack Marrakech</title>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <style>
        body {
            font-family: 'Urbanist', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">
    <!-- components/app.blade.php  -->
    <div class="min-h-screen bg-[#F1F1F1]">
        @include('components.nav')

        <!-- Page Content -->
        <main>
            @if(session('error'))
            <div class="fixed top-6 right-6 mt-14 z-50 bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-lg shadow-xl flex items-center gap-3 animate-fade-in" role="alert" style="min-width: 280px;">
                <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                </svg>
                <span class="block sm:inline">{{ __('Erreur :') }} {{ session('error') }}</span>
            </div>
            @endif

            @if(session('success'))
            <div class="fixed top-6 right-6 mt-14 z-50 bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg shadow-xl flex items-center gap-3 animate-fade-in" role="alert" style="min-width: 280px;">
                <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                </svg>
                <span class="block sm:inline">{{ __('Succès :') }} {{ session('success') }}</span>
            </div>
            @endif
            {{ $slot }}
        </main>

        @include('components.footer')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nav = document.getElementById('main-nav');
            if (!nav) return;

            window.addEventListener('scroll', function() {
                if (window.scrollY > 10) {
                    nav.classList.add('bg-yellow-900/50', 'shadow-lg', 'backdrop-blur-md');
                    nav.classList.remove('bg-yellow-900');
                } else {
                    nav.classList.remove('bg-yellow-900/50', 'shadow-lg', 'backdrop-blur-md');
                    nav.classList.add('bg-yellow-900');
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.bus-card');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-6');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target); // animate only once
                    }
                });
            }, {
                threshold: 0.15
            });

            cards.forEach(card => observer.observe(card));
        });
    </script>

</body>

</body>

</html>