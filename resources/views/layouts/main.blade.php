<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">
<div>
    @include('layouts.partials.header')

    @include('layouts.partials.sidebar')

    <main class="p-4 md:ml-64 h-auto pt-20">
        @yield('content')
    </main>

    <div class="flex overflow-hidden bg-white pt-16">
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            @include('layouts.partials.footer')
        </div>
    </div>
</div>

@vite('resources/js/app.js')
@livewireScripts
</body>
</html>
