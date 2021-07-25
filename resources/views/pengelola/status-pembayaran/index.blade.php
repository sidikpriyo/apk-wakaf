@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-status-pembayaran />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
