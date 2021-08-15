@extends('layouts.dashboard')


@section('sidebar-title')
    Kampanye
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('donatur-kampanye.index') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="flex items-center justify-between mb-8">
        <h4 class="font-bold text-2xl uppercase">{{ $search ? 'Hasil Pencarian: ' . $search : 'Kampanye' }}</h4>
        <div class="flex items-center space-x-2">
            <form action="{{ route('donatur-kampanye.index') }}" method="get">
                <input
                    class="h-9 text-xs px-2 w-full rounded text-gray-600 focus:outline-none focus:border focus:border-blue-700 dark:focus:border-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 border-gray-300 border"
                    type="text" name="search" placeholder="Cari Kampanye" />
            </form>
            <div class="relative inline-block text-left z-30" x-data="{show : false}">
                <div>
                    <button @click="show=!show" type="button"
                        class="h-9 inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Filter
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="show"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="{{ route('donatur-kampanye.index') }}" class="text-gray-700 block px-4 py-2 text-sm">
                            Semua
                        </a>
                        @foreach ($kategori as $item)
                            <a href="{{ route('donatur-kampanye.index', ['kategori' => $item->id]) }}"
                                class="text-gray-700 block px-4 py-2 text-sm">
                                {{ $item->nama ?? '-' }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 col-span-12 gap-7 pb-10">
        @foreach ($kampanye as $item)
            <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6">
                <a href="{{ route('donatur-kampanye.show', ['kampanye' => $item->id]) }}"
                    class="block transition duration-200 ease-out transform hover:scale-110 max-h-56">
                    <img class="object-cover w-full shadow-sm" src="{{ asset('storage/' . $item->gambar) }}">
                </a>
                <div
                    class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl w-full">
                    <div
                        class="bg-blue-500 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto rounded-xl text-xs uppercase text-white">
                        <span>{{ $item->kategori()->first()->nama }}</span>
                    </div>
                    <h2 class="text-base font-bold sm:text-lg md:text-xl">
                        <a href="{{ route('donatur-kampanye.show', ['kampanye' => $item->id]) }}">
                            {{ $item->nama }}
                        </a>
                    </h2>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $item->keterangan }}
                    </p>
                    <div class="relative pt-4 w-full">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                            <div style="width:{{ floor($item->terkumpul / $item->kebutuhan) }}%"
                                class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-full text-sm text-gray-700">
                        <div>Rp {{ number_format($item->terkumpul) }}</div>
                        <div>{{ $item->kapan_berakhir ?? 'Telah berakhir' }}</div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="mt-4">{{ $kampanye->appends(request()->except('page'))->links() }}</div>
@endsection
