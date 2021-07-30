<div class="flex justify-between h-20 items-center border-b border-gray-100 px-10">
    <div class="flex items-center justify-start space-x-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-6 h-6 cursor-pointer has-tooltip"
            data-original-title="null">
            <path
                d="M17.78,3.07H2.16A1.16,1.16,0,0,0,1,4.23V15.77a1.16,1.16,0,0,0,1.16,1.16H17.78a1.16,1.16,0,0,0,1.16-1.16V4.23A1.17,1.17,0,0,0,17.78,3.07Zm.32,12.37a.6.6,0,0,1-.61.6H7.88V4h9.61a.6.6,0,0,1,.61.6ZM2.87,8.85H6.13V10H2.87Zm0-2H6.13V8H2.87Zm0-1.92H6.13V6.08H2.87Zm11.62,8a.63.63,0,0,1-.4-.14l-2.94-2.5a.38.38,0,0,1,0-.6l2.94-2.5a.68.68,0,0,1,.78,0,.37.37,0,0,1,0,.61L12.3,10l2.59,2.21a.37.37,0,0,1,0,.61A.64.64,0,0,1,14.49,12.94Z"
                fill="currentColor">
            </path>
        </svg>
    </div>
    <div class="flex justify-end items-center space-x-8">
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
                @can('lembaga', User::class)
                    <x-dropdown-link :href="route('lembaga-profil.index')">
                        {{ __('Profil') }}
                    </x-dropdown-link>
                @endcan
                @can('donatur', User::class)
                    <x-dropdown-link :href="route('donatur-profil.index')">
                        {{ __('Profil') }}
                    </x-dropdown-link>
                @endcan
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Keluar') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</div>
