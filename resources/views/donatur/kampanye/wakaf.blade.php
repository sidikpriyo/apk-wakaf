@extends('layouts.dashboard')


@section('sidebar-title')
    Kampanye
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('donatur-kampanye.index') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    {{ $pembayaran }}
@endsection

@push('scripts')
    <script>
        function wakaf() {
            return {

            }
        }
    </script>
@endpush
