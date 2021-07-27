@extends('layouts.home')

@section('body')
    <section class="relative w-full bg-white">
        <div class="absolute w-full h-32 bg-gradient-to-b from-gray-100 to-white"></div>
        <div class="relative w-full px-5 py-10 mx-auto sm:py-12 md:py-16 md:px-10 max-w-7xl">

            <h1 class="mb-1 text-3xl font-extrabold leading-none text-gray-900 lg:text-4xl xl:text-5xl sm:mb-3">
                Majelis Wakaf dan Kehartabendaan
            </h1>
            <p class="text-lg font-medium text-gray-500 sm:text-2xl">
                Kami menyediakan platform berbasis web untuk memudahkan anda dalam menunaikan wakaf.
            </p>

            <div class="grid grid-cols-12 col-span-12 gap-7 pb-10 mt-8 sm:mt-16">
                @foreach ($kampanye as $item)
                    <div
                        class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                        <a href="#" class="block transition duration-200 ease-out transform hover:scale-110">
                            <img class="object-cover w-full shadow-sm max-h-56"
                                src="{{ asset('storage/' . $item->gambar) }}">
                        </a>
                        <div
                            class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl w-full">
                            <div
                                class="bg-indigo-400 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                                <span>{{ $item->kategori()->first()->nama }}</span>
                            </div>
                            <h2 class="text-base font-bold sm:text-lg md:text-xl">
                                <a href="#_">
                                    {{ $item->nama }}
                                </a>
                            </h2>
                            <p class="mt-2 text-sm text-gray-500">
                                {{ $item->keterangan }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
