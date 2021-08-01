@extends('layouts.dashboard')

@section('sidebar-title')
    Dashboard
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('dashboard') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    @can('pengelola', User::class)
        <livewire:dashboard-pengelola />
    @endcan
    @can('donatur', User::class)
        <livewire:dashboard-donatur />
    @endcan
    @can('lembaga', User::class)
        <livewire:dashboard-lembaga />
    @endcan
@endsection

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush
