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

    <div class="p-4 border border-gray-200 bg-gray-100 rounded-lg">
        <div class="flex items-center justify-between mb-5 mt-2 bg-white rounded-full border-gray-200 border space-x-2">
            <a href="{{ route('notifikasi', ['type' => 'unread']) }}"
                class="{{ $type === 'unread' ? 'bg-blue-500 text-white' : '' }} text-center w-full rounded-full text-xs py-2">
                Belum Dibaca
            </a>
            <a href="{{ route('notifikasi', ['type' => 'all']) }}"
                class="{{ $type === 'all' ? 'bg-blue-500 text-white' : '' }} text-center w-full rounded-full text-xs py-2">
                Tampilkan Semua
            </a>
        </div>

        @foreach ($notifikasi as $item)
            <a href="{{ route('goto', ['notifikasi' => $item->id]) }}">
                <div
                    class="px-6 py-4 {{ is_null($item->read_at) ? 'bg-blue-100' : 'bg-white' }} rounded-md border border-gray-200 flex items-start justify-between cursor-pointer">
                    <div class="flex items-center justify-start space-x-4">
                        <div class="flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-black">
                                {{ $item->data['title'] ?? '-' }}
                                #{{ $item->data['external_id'] ?? '-' }}
                            </div>
                            <p class="text-xs text-gray-500 truncate">{{ $item->data['message'] ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="text-xs flex justify-start items-start text-gray-700">
                        {{ $item->created_at }}
                    </div>
                </div>
            </a>
        @endforeach
        <div class="mt-4">
            {{ $notifikasi->links() }}
        </div>
    </div>

@endsection
