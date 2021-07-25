@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-jenis-pembayaran />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
