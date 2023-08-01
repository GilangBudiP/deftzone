<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Deftzone Indonesia - Digital Agency') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;800&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="relative font-inter">
    <!-- Navbar -->
    @include('layouts._partials.user.navbar')

    <!-- Content -->
    {{ $slot }}
    <!-- Footer -->
    @include('layouts._partials.user.footer')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./dist/js/tiny-slider/min/tiny-slider.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
</body>
</html>
