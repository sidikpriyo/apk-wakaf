@extends('layouts.dashboard')

@section('sidebar-title')
    Bank
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('donatur-kampanye.index') }}" aria-current="page"
                >Beranda</a>
        </li>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('donatur-kampanye.riwayat') }}" aria-current="page"
                >Riwayat</a>
        </li>
    </ul>
@endsection

@section('body')
    <livewire:tabel-riwayat />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush