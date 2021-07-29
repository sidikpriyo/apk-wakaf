@extends('layouts.dashboard')

@section('sidebar-title')
    Metode Pembayaran
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('metode-pembayaran.index') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Beranda</a>
        </li>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('pengaturan') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Pengaturan</a>
        </li>
    </ul>
@endsection

@section('body')
    <livewire:tabel-metode-pembayaran />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
