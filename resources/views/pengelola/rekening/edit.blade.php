@extends('layouts.dashboard')

@section('sidebar-title')
    Rekening
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('rekening.index') }}" aria-current="page"
                >Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="font-semibold text-xl mb-6">Edit Rekening</h2>
        <form action="{{ route('rekening.update', ['rekening' => $rekening->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="nama" :value="__('Nama')" />

                <x-input id="nama" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="nama"
                    :value="$rekening->nama" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="nomor" :value="__('Kode')" />

                <x-input id="nomor" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="nomor"
                    :value="$rekening->nomor" required />
            </div>

            <div class="mt-4">
                <x-label for="bank_id" :value="__('Bank')" />

                <x-select name="bank_id" id="bank_id">
                    @foreach ($bank as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-6">
                <button
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 focus:bg-blue-800 focus:outline-none w-full sm:w-auto bg-blue-700 transition duration-150 ease-in-out hover:bg-blue-600 rounded text-white px-8 py-3 text-sm"
                    type="submit">
                    {{ __('Ubah Data') }}
                </button>
            </div>
        </form>
    </div>
@endsection
