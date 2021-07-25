@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-metode-pembayaran />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
