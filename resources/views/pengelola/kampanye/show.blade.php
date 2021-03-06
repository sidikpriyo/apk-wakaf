@extends('layouts.dashboard')

@section('sidebar-title')
    Kampanye
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('pengelola-kampanye.index') }}" aria-current="page"
                >Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="bg-white rounded-lg border border-gray-200">
        <h2 class="font-semibold text-xl p-6">Detail Kampanye</h2>
        <dl class="border-b border-gray-100">
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    ID
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $kampanye->id ?? '-' }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Nama
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $kampanye->nama ?? '-' }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Gambar
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    <a class="text-indigo-500 underline" href="{{ asset('storage/' . $kampanye->gambar) ?? '-' }}"
                        target="_blank" rel="noopener noreferrer">{{ asset('storage/' . $kampanye->gambar) ?? '-' }}</a>
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Keterangan
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $kampanye->keterangan ?? '-' }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Deskripsi
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $kampanye->deskripsi ?? '-' }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Kebutuhan
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ number_format($kampanye->kebutuhan ?? 0) }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Terkumpul
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ number_format($kampanye->terkumpul ?? 0) }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Status
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ is_null($kampanye->tanggal_publikasi) ? 'Menunggu Persetujuan' : 'Aktif' }}
                </dd>
            </div>
        </dl>

        <div class="flex items-center justify-between p-6">
            <div class="flex items-center space-x-2">
                <a href="{{ route('pengelola-kampanye.edit', ['kampanye' => $kampanye->id]) }}"
                    class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-200 focus:outline-none">
                    <span>Edit Data</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-5 w-5 m-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </a>
                <form method="POST" action="{{ route('pengelola-kampanye.destroy', ['kampanye' => $kampanye->id]) }}">
                    @method('DELETE')
                    @csrf

                    <a :href="{{ route('pengelola-kampanye.destroy', ['kampanye' => $kampanye->id]) }}"
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
            <a href="{{ route('pengelola-kampanye.publikasi', ['kampanye' => $kampanye->id]) }}"
                class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-200 focus:outline-none">
                <span>Publikasi</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
            </a>
        </div>
    </div>
@endsection
