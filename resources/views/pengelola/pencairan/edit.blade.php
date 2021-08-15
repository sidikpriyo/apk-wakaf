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
    <div class="bg-white rounded-lg border border-gray-200 mb-8">
        <h2 class="font-semibold text-xl p-6">Penerima</h2>
        <dl class="border-b border-gray-100">
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Nama
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $lembaga->nama ?? '-' }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Rekening
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $lembaga->rekening ?? '-' }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Bank
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $lembaga->bank->nama ?? '-' }}
                </dd>
            </div>
        </dl>
    </div>
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <h2 class="font-semibold text-xl mb-6">Data</h2>
        <form action="{{ route('pengelola-pencairan.update', ['pencairan' => $pencairan->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="nominal" :value="__('Nama')" />

                <x-input id="nominal" class="block mt-1 w-full border border-gray-200 p-1" type="number" name="nominal"
                    :value="$pencairan->nominal" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="keterangan" :value="__('Keterangan')" />

                <x-input id="keterangan" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="keterangan"
                    :value="$pencairan->keterangan" required autofocus />
            </div>

            <div class="mt-6">
                <button
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 focus:bg-blue-800 focus:outline-none w-full sm:w-auto bg-blue-700 transition duration-150 ease-in-out hover:bg-blue-600 rounded text-white px-8 py-3 text-sm"
                    type="submit">
                    {{ __('Proses Pencairan') }}
                </button>
            </div>
        </form>
    </div>
@endsection
