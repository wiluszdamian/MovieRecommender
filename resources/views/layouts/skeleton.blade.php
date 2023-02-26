<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Icon -->
    <link rel="icon"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png"
        type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire -->
    @livewireStyles
</head>

<body class="bg-gray-800 antialiased">
    <div>
        @include('partials.navbar');
    </div>
    <div class="content" style="margin-left: 20%; margin-right: 20%;">
        @if (Session::has('success'))
            <div class="alert border border-green-400 text-gray-900 px-4 py-3 rounded relative bg-green-100"
                role="alert">
                <span class="block sm:inline">{{ Session::get('success') }}</span>
            </div><br />
        @endif
        @if (Session::has('error'))
            <div class="alert border border-red-400 text-gray-900 px-4 py-3 rounded relative bg-red-100" role="alert">
                <span class="block sm:inline">{{ Session::get('error') }}</span>
            </div><br />
        @endif
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
