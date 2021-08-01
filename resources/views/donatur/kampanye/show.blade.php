@extends('layouts.dashboard')


@section('sidebar-title')
    Kampanye
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('donatur-kampanye.index') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
        <div class="block transition duration-200 ease-out transform hover:scale-110">
            <img class="object-cover w-full shadow-sm max-h-56" src="{{ asset('storage/' . $kampanye->gambar) }}">
        </div>
        <div
            class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl w-full">
            <div
                class="bg-blue-500 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto rounded-xl text-xs uppercase text-white">
                <span>{{ $kampanye->kategori()->first()->nama }}</span>
            </div>
            <h2 class="text-base font-bold sm:text-lg md:text-xl">
                {{ $kampanye->nama }}
            </h2>
            <p class="mt-2 text-sm text-gray-500">
                {{ $kampanye->keterangan }}
            </p>
            <div class="mt-4 flex items-center space-x-2">
                <span class="font-semibold text-lg text-blue-500">
                    Rp {{ number_format($kampanye->terkumpul) }}
                </span>
                <span class="text-gray-600 text-xs">
                    terkumpul dari Rp {{ number_format($kampanye->kebutuhan) }}
                </span>
            </div>
            <div class="relative pt-4 w-full">
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                    <div style="width:{{ floor($kampanye->terkumpul / $kampanye->kebutuhan) }}%"
                        class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center w-full text-sm text-gray-700">
                <div>{{ $kampanye->donasi_count }} Donatur</div>
                <div>{{ $kampanye->kapan_berakhir ?? 'Telah berakhir' }}</div>
            </div>

            <div class="mt-6 w-full">
                <a href="{{ is_null($kampanye->kapan_berakhir) ? '#' : route('donatur-kampanye.wakaf', ['kampanye' => $kampanye->id]) }}"
                    class="{{ is_null($kampanye->kapan_berakhir) ? 'bg-blue-400 hover:bg-blue-400 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-400' }} text-white block w-full font-semibold text-sm rounded px-4 py-3 text-center">
                    Wakaf
                    sekarang!
                </a>
            </div>
        </div>
    </div>

    <div class="mt-8 border border-gray-200 rounded-lg bg-white px-6 py-7">
        <h2 class="text-base font-bold sm:text-lg md:text-xl">
            Penggalang Dana
        </h2>
        <p class="mt-2 text-sm text-gray-500">
            {{ $kampanye->lembaga->name ?? '-' }}
        </p>
    </div>

    <div class="mt-8 border border-gray-200 rounded-lg bg-white px-6 py-7">
        <h2 class="text-base font-bold sm:text-lg md:text-xl">
            Penggunaan Dana
        </h2>
        <p class="mt-2 text-sm text-gray-500">
            {{ $kampanye->deskripsi ?? '-' }}
        </p>
    </div>

    <div class="mt-8 border border-gray-200 rounded-lg bg-white px-6 py-7">
        <h2 class="text-base font-bold sm:text-lg md:text-xl mb-4">
            Donatur
        </h2>
        @if ($kampanye->donasi_count === 0)
            <div class="bg-gray-100 p-3 rounded-lg mb-3">
                <div class="text-xs uppercase text-gray-500 text-center">Jadilah yang pertama</div>
            </div>
        @endif
        @foreach ($kampanye->donasi as $item)
            <div class=" bg-gray-100 p-3 rounded-lg mb-3">
                <div class="flex items-center justify-between text-sm">
                    <div class="font-bold">{{ $item->name }}</div>
                    <div class="font-light text-gray-700">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                    </div>
                </div>
                <p class="text-gray-700 text-xs">Donasi Rp {{ number_format($item->nominal) }}</p>
            </div>
        @endforeach
    </div>
@endsection
