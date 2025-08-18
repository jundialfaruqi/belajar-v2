<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - My App</title>
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    {{-- scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div class="page">
        <!-- Sidebar -->
        @include('components.layouts.sidebar')
        <!-- Navbar -->
        @include('components.layouts.navbar')
        <div class="page-wrapper">
            {{-- content --}}
            {{ $slot }}
            {{-- footer --}}
            @include('components.layouts.footer')
        </div>

    </div>

    @livewireScripts
</body>

</html>
