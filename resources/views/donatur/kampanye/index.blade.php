@extends('layouts.dashboard')


@section('sidebar-title')
    Kampanye
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('donatur-kampanye.index') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="grid grid-cols-12 col-span-12 gap-7 pb-10">
        @foreach ($kampanye as $item)
            <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6">
                <a href="{{ route('donatur-kampanye.show', ['kampanye' => $item->id]) }}"
                    class="block transition duration-200 ease-out transform hover:scale-110">
                    <img class="object-cover w-full shadow-sm max-h-56" src="{{ asset('storage/' . $item->gambar) }}">
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
                        <div>{{ $item->tanggal_berakhir }}</div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="mt-4">{{ $kampanye->links() }}</div>
@endsection
