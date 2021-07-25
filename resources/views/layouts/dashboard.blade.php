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
    {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}

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

<body class="text-gray-700 antialiased bg-blueGray-50">
    @include('layouts.dashboard.sidebar')
    <div class="relative md:ml-64 bg-blueGray-50 h-screen">
        <nav
            class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center py-4">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 py-4">
                <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                    href="{{ url()->current() }}">
                    {{ \Illuminate\Support\Facades\Route::currentRouteName() }}
                </a>

                <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                    <div class="items-center flex">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex space-x-4 items-center text-sm font-medium text-white hover:text-gray-200 focus:outline-none transition duration-150 ease-in-out">

                                    <div class="text-right">
                                        <p class="text-base font-bold">{{ Auth::user()->name }}</p>
                                        <p class="text-sm">{{ Auth::user()->email }}</p>
                                    </div>

                                    <span
                                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>

                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                    </div>
                </ul>
            </div>
        </nav>
        <!-- Header -->
        <div class="bg-teal-600 md:pt-32 pb-32 pt-12">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div>
                    @yield('header')
                </div>
            </div>
        </div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24 pb-24">
            @yield('body')
        </div>
    </div>
    @stack('scripts')
</body>
</html>
