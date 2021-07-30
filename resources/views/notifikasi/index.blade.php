@extends('layouts.dashboard')

@section('sidebar-title')
    Notifikasi
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded bg-gray-100">
            <a href="{{ route('notifikasi') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')

    @foreach ($notifikasi as $item)
        <div class="px-6 py-4 mx-auto bg-white rounded-md border border-gray-200 flex items-center space-x-4 cursor-pointer">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <div class="text-base font-medium text-black">
                    {{ $item->data['title'] ?? '-' }}
                    #{{ $item->data['external_id'] ?? '-' }}
                </div>
                <p class="text-sm text-gray-500 truncate">{{ $item->data['message'] ?? '-' }}</p>
            </div>
        </div>
    @endforeach

@endsection
