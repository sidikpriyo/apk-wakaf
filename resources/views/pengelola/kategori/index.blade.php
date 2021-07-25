@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-kategori />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
