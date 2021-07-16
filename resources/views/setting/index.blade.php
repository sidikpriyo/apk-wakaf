@extends('layouts.dashboard')

@section('body')
    <div class="flex space-x-8 mb-8">
        <a href="{{ route('user.donatur') }}"
            class="bg-white h-36 rounded-lg shadow w-full flex items-center justify-center">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-semibold">Donatur</span>
            </div>
        </a>
        <a href="{{ route('user.lembaga') }}"
            class="bg-white h-36 rounded-lg shadow w-full flex items-center justify-center">
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

@endsection
