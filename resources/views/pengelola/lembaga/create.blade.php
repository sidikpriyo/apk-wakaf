@extends('layouts.dashboard')

@section('body')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="font-semibold text-xl mb-6">Tambah Lembaga</h2>
        <form action="{{ route('lembaga.store') }}" method="POST">
            @csrf
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full border border-gray-200 p-1" type="text" name="name"
                    :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full border border-gray-200 p-1" type="email" name="email"
                    :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full border border-gray-200 p-1" type="password" name="password"
                    required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full border border-gray-200 p-1" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="mt-6">
                <button
                    class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 focus:bg-teal-800 focus:outline-none w-full sm:w-auto bg-teal-700 transition duration-150 ease-in-out hover:bg-teal-600 rounded text-white px-8 py-3 text-sm"
                    type="submit">
                    {{ __('Tambah Lembaga') }}
                </button>
            </div>
        </form>
    </div>
@endsection