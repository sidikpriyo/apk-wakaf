@extends('layouts.dashboard')

@section('body')
    <livewire:tabel-kampanye />
@endsection

@push('scripts')
    @livewireScripts
@endpush

@push('styles')
    @livewireStyles
@endpush
