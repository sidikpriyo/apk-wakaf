<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('styles')
    <style>
        [x-cloak] {
            display: none;
        }

    </style>
</head>

<body class="bg-gray-100 h-screen w-screen flex overflow-hidden">

    @include('layouts.dashboard.navigation')

    @include('layouts.dashboard.sidebar')

    <div class="min-h-screen flex flex-col flex-1 overflow-x-scroll bg-gradient-to-tr from-white to-gray-50">
        @include('layouts.dashboard.topbar')
        <div class="p-10 flex flex-1 flex-grow overflow-x-scroll">
            <div class="w-full">
                <div class="pb-14">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
