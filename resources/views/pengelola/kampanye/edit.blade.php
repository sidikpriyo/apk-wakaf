@extends('layouts.dashboard')

@section('body')
    <div class="bg-white rounded-lg shadow-lg p-6">

        {{ $error ?? '' }}
        <h2 class="font-semibold text-xl mb-6">Edit Kampanye</h2>
        <form action="{{ route('kampanye.update', ['kampanye' => $kampanye->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="nama" :value="__('Nama')" />

                <x-input id="nama" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="nama"
                    :value="$kampanye->nama" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="gambar" :value="__('Gambar')" />

                <x-input id="gambar" class="block mt-1 w-full border border-gray-200 p-1" type="file" name="gambar"
                    :value="$kampanye->gambar" />
            </div>

            <div class="mt-4">
                <x-label for="keterangan" :value="__('Keterangan')" />

                <x-textarea id="keterangan" class="block mt-1 w-full border border-gray-200 p-1" type="text"
                    name="keterangan" required>
                    {{ $kampanye->keterangan }}
                </x-textarea>
            </div>

            <div class="mt-4">
                <x-label for="deskripsi" :value="__('Deskripsi')" />

                <x-textarea id="deskripsi" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="deskripsi"
                    :value="$kampanye->deskripsi" required>
                    {{ $kampanye->deskripsi }}
                </x-textarea>
            </div>

            <div class="mt-4">
                <x-label for="kebutuhan" :value="__('Kebutuhan')" />

                <x-input id="kebutuhan" class="block mt-1 w-full border border-gray-200 p-1" type="number" name="kebutuhan"
                    :value="$kampanye->kebutuhan" required />
            </div>

            <div class="mt-4">
                <x-label for="tanggal_berakhir" :value="__('Tanggal Berakhir')" />

                <x-input id="tanggal_berakhir" class="block mt-1 w-full border border-gray-200 p-1" type="date"
                    name="tanggal_berakhir" :value="\Carbon\Carbon::parse($kampanye->tanggal_berakhir)->format('Y-m-d')"
                    required />
            </div>

            <div class="mt-4">
                <x-label for="kategori_id" :value="__('Kategori')" />

                <x-select name="kategori_id" id="kategori_id">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-4">
                <x-label for="lembaga_id" :value="__('Lembaga')" />

                <x-select name="lembaga_id" id="lembaga_id">
                    @foreach ($lembaga as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </x-select>
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
