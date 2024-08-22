<!--
Product: Metronic is a toolkit of UI components built with Tailwind CSS for developing scalable web applications quickly and efficiently
Version: v9.0.0
Author: Keenthemes
Contact: support@keenthemes.com
Website: https://www.keenthemes.com
Support: https://devs.keenthemes.com
Follow: https://www.twitter.com/keenthemes
License: https://keenthemes.com/metronic/tailwind/docs/getting-started/license
-->
<!doctype html>
<html class="h-full" data-theme="true" data-theme-mode="light" lang="en">

<head>
    <meta charset="utf-8">
    <title>ToDo App</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
<div class="antialiased bg-gray-50 dark:bg-gray-900">
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
