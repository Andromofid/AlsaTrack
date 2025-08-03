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
        @include('admin.layouts.nav')

        <!-- Page Content -->
        <main>
            
            {{ $slot }}
        </main>

        @include('admin.layouts.footer')
    </div>
</body>

</html>