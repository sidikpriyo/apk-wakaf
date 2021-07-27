@extends('layouts.dashboard')

@section('sidebar-title')
    Kategori
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('kategori.index') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="font-semibold text-xl mb-6">Edit Kategori</h2>
        <form action="{{ route('kategori.update', ['kategori' => $kategori->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="nama" :value="__('Nama')" />

                <x-input id="nama" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="nama"
                    :value="$kategori->nama" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="kode" :value="__('Kode')" />

                <x-input id="kode" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="kode"
                    :value="$kategori->kode" required />
            </div>

            <div class="mt-6">
                <button
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 focus:bg-teal-800 focus:outline-none w-full sm:w-auto bg-teal-700 transition duration-150 ease-in-out hover:bg-teal-600 rounded text-white px-8 py-3 text-sm"
                    type="submit">
                    {{ __('Ubah Data') }}
                </button>
            </div>
        </form>
    </div>
@endsection
