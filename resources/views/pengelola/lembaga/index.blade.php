@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-lembaga />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
