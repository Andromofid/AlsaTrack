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