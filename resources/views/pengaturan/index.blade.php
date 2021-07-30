@extends('layouts.dashboard')

@section('sidebar-title')
    Pengaturan
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('pengaturan') }}" aria-current="page"
                >Beranda</a>
        </li>
    </ul>
@endsection

@section('body')

    @can('pengelola', User::class)
        <div class="grid grid-cols-3 gap-4">
            <a href="{{ route('status-pembayaran.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-semibold">Status Pembayaran</span>
                </div>
            </a>
            <a href="{{ route('jenis-pembayaran.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span class="font-semibold">Jenis Pembayaran</span>
                </div>
            </a>
            <a href="{{ route('metode-pembayaran.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold">Metode Pembayaran</span>
                </div>
            </a>
            <a href="{{ route('kategori.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span class="font-semibold">Kategori</span>
                </div>
            </a>
            <a href="{{ route('donatur.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold">Donatur</span>
                </div>
            </a>
            <a href="{{ route('lembaga.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                    </svg>
                    <span class="font-semibold">Lembaga</span>
                </div>
            </a>
        </div>
    @endcan

    @can('lembaga', User::class)
        <div class="grid grid-cols-3 gap-4">
            <a href="{{ route('lembaga-profil.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold">Profil</span>
                </div>
            </a>
        </div>
    @endcan

    @can('donatur', User::class)
        <div class="grid grid-cols-3 gap-4">
            <a href="{{ route('donatur-profil.index') }}"
                class="bg-white h-36 rounded-lg w-full flex items-center justify-center border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-semibold">Profil</span>
                </div>
            </a>
        </div>
    @endcan

@endsection
