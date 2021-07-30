<section class="w-full px-8 text-gray-700 bg-white">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="{{ route('home') }}"
                class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">
                    {{ config('app.name') }}
                </span>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                @guest
                    <a href="{{ route('home') }}" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">
                        Beranda
                    </a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">
                        Dahsboard
                    </a>
                @endauth
            </nav>
        </div>

        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
            @guest
                <a href="{{ route('login') }}"
                    class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                    Daftar
                </a>
            @endguest
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="flex items-center space-x-2 relative cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                class="h-8 w-8">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            <div class="text-xs">
                                <div class="flex items-center justify-between">
                                    <span class="uppercase font-light mb-0.5">{{ Auth::user()->role }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-4 h-4 transition-transform transform">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                                <div class="truncate font-semibold">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="origin-top-right absolute right-0 top-10 w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                style="display: none;">
                                <div class="py-1">
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm">
                                        Keluar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>
    </div>
</section>
