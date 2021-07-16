@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-donatur />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
