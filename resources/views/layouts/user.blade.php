<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;800&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

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
    @if ($withoutFooter == false)
        @include('layouts._partials.user.footer')
    @else
        @include('layouts._partials.user.simple-footer')
    @endif
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./dist/js/tiny-slider/min/tiny-slider.js"></script>
    <script>
        AOS.init();
    </script>
    @stack('scripts')
</body>

</html>
