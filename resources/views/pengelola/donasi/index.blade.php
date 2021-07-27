@extends('layouts.dashboard')

@section('sidebar-title')
    Donasi
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('donasi.index') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <livewire:tabel-donasi />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
