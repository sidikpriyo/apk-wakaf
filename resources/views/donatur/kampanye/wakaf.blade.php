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
    <div x-data="wakaf()">
        <div x-show="step === 1">
            <h2 class="text-xl font-semibold mb-4">Masukan Nominal Wakaf</h2>
            <template x-for="item in nominals">
                <button type="button" @click="setNominal(item)"
                    :class="{'bg-blue-100' : item.nominal === nominalPembayaran}"
                    class="py-3 px-4 block w-full text-left border border-gray-200 mb-2 rounded-lg text-sm font-semibold"
                    x-text="item.terbilang" />
            </template>
            <div class="border border-gray-200 p-4 rounded-md mt-4">
                <label class="block text-gray-700 text-xs mb-2">
                    Nominal Donasi Lainnya
                </label>
                <input class="rounded-lg form-input border border-gray-200 block w-full sm:text-sm sm:leading-5"
                    type="number" placeholder="Ex: 10000" x-model="nominalPembayaran">
            </div>
            <div class="mt-6" @click="nextStep()">
                <button type="button" class="bg-blue-500 text-white text-xs uppercase block py-3 rounded-lg px-2 w-full">
                    Lanjutkan Pembayaran
                </button>
            </div>
        </div>
        <div x-show="step === 2">
            <h2 class="text-xl font-semibold mb-2">Metode Pembayaran</h2>
            <div class="mb-2">
                <p class="mb-2 text-sm text-gray-500">Virtual account (verifikasi otomatis, minimal nominal Rp. 10,000)</p>
                <div class="border border-gray-200 rounded-lg divide-solid divide-y divide-gray-200">
                    @foreach ($metode_pembayaran['gateway'] as $item)
                        <div class="flex items-center space-x-2 text-sm p-2">
                            <input x-model="pembayaranId" id="{{ $item['kode'] . '-' . $item['id'] }}" type="radio"
                                name="pembayaran_id" value="{{ $item['id'] }}" />
                            <label class="cursor-pointer"
                                for="{{ $item['kode'] . '-' . $item['id'] }}">{{ $item['nama'] }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-2">
                <p class="mb-2 text-sm text-gray-500">Transfer bank (verifikasi manual 1x24 jam, minimal nominal Rp. 10,000)
                </p>
                <div class="border border-gray-200 rounded-lg divide-solid divide-y divide-gray-200">
                    @foreach ($metode_pembayaran['transfer'] as $item)
                        <div class="flex items-center space-x-2 text-sm p-2">
                            <input x-model="pembayaranId" id="{{ $item['kode'] . '-' . $item['id'] }}" type="radio"
                                name="pembayaran_id" value="{{ $item['id'] }}" />
                            <label class="cursor-pointer"
                                for="{{ $item['kode'] . '-' . $item['id'] }}">{{ $item['nama'] }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-2">
                <p class="mb-2 text-sm text-gray-500">Bayar ditempat (verifikasi manual di lokasi penggalangan dana)</p>
                <div class="border border-gray-200 rounded-lg divide-solid divide-y divide-gray-200">
                    @foreach ($metode_pembayaran['tunai'] as $item)
                        <div class="flex items-center space-x-2 text-sm p-2">
                            <input x-model="pembayaranId" id="{{ $item['kode'] . '-' . $item['id'] }}" type="radio"
                                name="pembayaran_id" value="{{ $item['id'] }}" />
                            <label class="cursor-pointer"
                                for="{{ $item['kode'] . '-' . $item['id'] }}">{{ $item['nama'] }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-6" @click="nextStep()">
                <button type="button" class="bg-blue-500 text-white text-xs uppercase block py-3 rounded-lg px-2 w-full">
                    Lanjutkan Pembayaran
                </button>
            </div>
        </div>
        <div x-show="step === 3">
            <h2 class="text-xl font-semibold mb-1">Konfirmasi Pembayaran</h2>
            <p class="mb-4 text-sm text-gray-700">{{ $kampanye->nama }}</p>
            <form action="{{ route('donatur-kampanye.store', ['id' => $kampanye->id]) }}" method="post">
                @csrf
                <div class="border border-gray-200 p-4 rounded-md mb-6">
                    <label class="block text-gray-700 text-xs mb-2">
                        Nominal Donasi
                    </label>
                    <input class="rounded-lg form-input border border-gray-200 block w-full sm:text-sm sm:leading-5"
                        type="number" placeholder="Ex: 10000" x-model="nominalPembayaran" name="nominal">
                </div>

                <select name="pembayaran_id" x-model="pembayaranId"
                    class="form-select border border-gray-200 rounded-lg w-full text-sm mb-2">
                    @foreach ($pembayaran as $item)
                        <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                    @endforeach
                </select>

                <hr class="border-gray-200 my-4">
                <div class="mb-4">
                    <x-label for="catatan" :value="__('Catatan (Opsional):')" />

                    <textarea name="catatan" id="catatan" rows="5" id="catatan"
                        class="p-4 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-4 w-full border border-gray-200 text-xs"
                        placeholder="Tulis doa untuk penggalang dana atau diri anda sendiri."></textarea>
                </div>

                <button type="submit" class="bg-blue-500 text-white text-xs uppercase block py-3 rounded-lg px-2 w-full">
                    Konfirmasi Pembayaran
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function wakaf() {
            return {
                nominals: [{
                        nominal: 10000,
                        terbilang: 'Rp 10.000'
                    },
                    {
                        nominal: 20000,
                        terbilang: 'Rp 20.000'
                    },
                    {
                        nominal: 50000,
                        terbilang: 'Rp 50.000'
                    },
                    {
                        nominal: 100000,
                        terbilang: 'Rp 100.000'
                    },
                ],
                nominalPembayaran: '',
                pembayaranId: '',
                step: 1,
                setNominal(item) {
                    this.nominalPembayaran = item.nominal;
                },
                nextStep() {
                    if (this.step === 1 && this.nominalPembayaran === '' || this.step === 2 && this.pembayaranId === '') {
                        return
                    }
                    this.step++
                }
            }
        }
    </script>
@endpush
