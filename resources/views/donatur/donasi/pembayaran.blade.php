@extends('layouts.dashboard')

@section('sidebar-title')
    Donasi
@endsection

@section('sidebar-body')
    <ul>
        <li class="mb-2 block text-sm text-gray-700 py-1.5 px-2 mx-4 hover:bg-gray-100 rounded">
            <a href="{{ route('donatur-donasi.index') }}" aria-current="page">Beranda</a>
        </li>
    </ul>
@endsection

@section('body')
    @if ($metode === 'tunai')
        <p>Silahkan konfirmasi secara manual ke pihak penggalang dana.</p>
    @endif
    @if ($metode === 'transfer')
        <div class="bg-white rounded-lg border border-gray-200 mb-6">
            <h2 class="font-semibold text-xl p-6">Rekening Pembayaran</h2>
            <dl class="border-b border-gray-100">
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Nama
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $rekening->nama ?? '-' }}
                    </dd>
                </div>
            </dl>
            <dl class="border-b border-gray-100">
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Rekening
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $rekening->nomor ?? '-' }}
                    </dd>
                </div>
            </dl>
            <dl class="border-b border-gray-100">
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Bank
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $rekening->bank ?? '-' }}
                    </dd>
                </div>
            </dl>
        </div>

        <div class="bg-white rounded-lg border border-gray-200">
            <h2 class="font-semibold text-xl p-6">Konfirmasi Pembayaran</h2>
            <dl class="border-b border-gray-100">
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        ID
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $donasi->id ?? '-' }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Nominal
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        Rp {{ number_format($donasi->nominal) }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Status Pembayaran
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $donasi->status->nama ?? '-' }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm leading-5 font-medium text-gray-500">
                        Metode Pembayaran
                    </dt>
                    <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $donasi->metode->nama ?? '-' }}
                    </dd>
                </div>
                @if (!is_null($rekening->bukti))
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Bukti Pembayaran
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            <a class="text-indigo-500 underline" href="{{ asset('storage/' . $rekening->bukti) }}">
                                {{ $rekening->bukti ?? '-' }}
                            </a>
                        </dd>
                    </div>
                @endif
            </dl>
            @if (is_null($rekening->bukti))
                <form action="{{ route('donatur-donasi.bukti', ['donasi' => $donasi->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="p-6">
                        <x-label for="bukti" :value="__('Bukti Pembayaran')" />

                        <x-input id="bukti" class="block mt-1 w-full border border-gray-200 p-1 text-xs" type="file"
                            name="bukti" :value="old('bukti')" required />
                    </div>
                    <div class="flex items-center space-x-1 justify-start px-6 pb-6">
                        <button type="submit"
                            class="flex items-center space-x-2 px-3 border border-green-400 rounded-md bg-white text-green-500 text-xs leading-4 font-medium uppercase tracking-wider hover:bg-green-200 focus:outline-none">
                            <span>Konfirmasi Pembayaran</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-5 w-5 m-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            @endif
        </div>
    @endif
@endsection
