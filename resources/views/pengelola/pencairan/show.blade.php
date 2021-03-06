@extends('layouts.dashboard')

@section('sidebar-title')
    Pencairan
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('pengelola-pencairan.index') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="bg-white rounded-lg border border-gray-200">
        <h2 class="font-semibold text-xl p-6">Detail Pencairan</h2>
        <dl class="border-b border-gray-100">
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    ID
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $pencairan->id ?? '-' }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Kampanye
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $pencairan->kampanye->nama ?? '-' }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Tanggal
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $pencairan->created_at ?? '-' }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Nominal
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    Rp {{ number_format($pencairan->nominal) }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Keterangan
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $pencairan->keterangan ?? '-' }}
                </dd>
            </div>

        </dl>

        <div class="flex items-center justify-between p-6">
            <div class="flex items-center space-x-1 justify-start">
                <a href="{{ route('pengelola-pencairan.edit', ['pencairan' => $pencairan->id]) }}"
                    class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-200 focus:outline-none">
                    <span>Proses Pencairan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-5 w-5 m-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </a>
                <form method="POST" action="{{ route('pengelola-pencairan.destroy', ['pencairan' => $pencairan->id]) }}">
                    @method('DELETE')
                    @csrf

                    <a :href="{{ route('pengelola-pencairan.destroy', ['pencairan' => $pencairan->id]) }}"
                        onclick="event.preventDefault();this.closest('form').submit();"
                        class="cursor-pointer flex items-center space-x-2 px-3 border border-red-400 rounded-md bg-white text-red-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-red-200 focus:outline-none">
                        <span>Hapus Data</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-5 w-5 m-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
