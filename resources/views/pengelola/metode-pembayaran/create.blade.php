@extends('layouts.dashboard')

@section('body')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="font-semibold text-xl mb-6">Tambah Metode Pembayaran</h2>
        <form action="{{ route('metode-pembayaran.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="name" :value="__('Nama')" />

                <x-input id="nama" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="nama"
                    :value="old('nama')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="kode" :value="__('Kode')" />

                <x-input id="kode" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="kode"
                    :value="old('kode')" required />
            </div>

            <div class="mt-4">
                <x-label for="jenis_pembayaran_id" :value="__('Jenis Pembayaran')" />

                <x-select name="jenis_pembayaran_id" id="jenis_pembayaran_id">
                    @foreach ($jenis_pembayaran as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-6">
                <button
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 focus:bg-teal-800 focus:outline-none w-full sm:w-auto bg-teal-700 transition duration-150 ease-in-out hover:bg-teal-600 rounded text-white px-8 py-3 text-sm"
                    type="submit">
                    {{ __('Tambah Metode Pembayaran') }}
                </button>
            </div>
        </form>
    </div>
@endsection
