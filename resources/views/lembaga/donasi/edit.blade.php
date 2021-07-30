@extends('layouts.dashboard')

@section('sidebar-title')
    Donasi
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('lembaga-donasi.index') }}" aria-current="page"
                >Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="font-semibold text-xl mb-6">Edit Donasi</h2>
        <form action="{{ route('lembaga-donasi.update', ['donasi' => $donasi->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="nominal" :value="__('Nama')" />

                <x-input id="nominal" class="block mt-1 w-full border border-gray-200 p-1" type="number" name="nominal"
                    :value="$donasi->nominal" required autofocus />
            </div>

            <div>
                <x-label for="catatan" :value="__('Catatan')" />

                <x-input id="catatan" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="catatan"
                    :value="$donasi->catatan" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="donatur_id" :value="__('Doantur')" />

                <x-select name="donatur_id" id="donatur_id">
                    @foreach ($donatur as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-4">
                <x-label for="kampanye_id" :value="__('Kampanye')" />

                <x-select name="kampanye_id" id="kampanye_id">
                    @foreach ($kampanye as $item)
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
