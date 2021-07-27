@extends('layouts.dashboard')

@section('sidebar-title')
    Status Pembayaran
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('status-pembayaran.index') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Beranda</a>
        </li>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('setting') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Pengaturan</a>
        </li>
    </ul>
@endsection

@section('body')
    <livewire:tabel-status-pembayaran />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
