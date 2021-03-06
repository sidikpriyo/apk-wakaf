<x-guest-layout>
    <section class="bg-white md:h-screen">
        <div class="mx-auto flex justify-center h-full flex-col lg:flex-row">
            <div class="w-full sm:mb-10 lg:w-1/2 flex justify-center bg-white dark:bg-gray-900">
                <div class="
                  w-full
                  sm:w-4/6
                  md:w-3/6
                  lg:w-2/3
                  text-gray-800
                  dark:text-gray-100
                  mb-12
                  sm:mb-0
                  flex flex-col
                  justify-center
                  px-2
                  sm:px-0
                 ">
                    <div class="mb-4">
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </a>
                    </div>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Masukan email anda dan kami akan mengirimkan link untuk mereset password anda.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button
                                class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 focus:bg-blue-800 focus:outline-none w-full sm:w-auto bg-blue-700 transition duration-150 ease-in-out hover:bg-blue-600 rounded text-white px-8 py-3 text-sm mt-6"
                                type="submit">
                                {{ __('Kirim Link Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="
                 w-full
                 lg:w-1/2
                 bg-gradient-to-tl
                 from-blue-500
                 to-blue-600
                 px-2
                 py-40
                 sm:py-48 sm:px-12
                 flex flex-col
                 justify-center
                 relative
                 bg-no-repeat bg-center bg-cover
                 h-full
                ">
                <div class="absolute top-0 right-0 pt-3 pr-3 text-white">
                    <svg width="199" height="131" xmlns="http://www.w3.org/2000/svg">
                        <g transform="rotate(-90 65.5 65)" fill="#F7FAFC" fill-rule="evenodd">
                            <rect width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                        </g>
                    </svg>
                </div>
                <div class="
                  flex
                  relative
                  z-30
                  flex-col
                  justify-center
                  pl-4
                  md:pr-12
                  xl:pr-12
                  md:pl-24
                 ">
                    <h3 class="text-4xl font-extrabold leading-tight text-white">
                        Lupa Password
                    </h3>
                    <p class="text-xl text-white leading-normal pt-3 xl:w-10/12">
                        Link reset password akan dikirim melalui email.
                    </p>
                </div>
                <div class="z-20 absolute bottom-0 left-0 pb-3 pl-3 text-white">
                    <svg width="199" height="131" xmlns="http://www.w3.org/2000/svg">
                        <g transform="rotate(-90 65.5 65)" fill="#F7FAFC" fill-rule="evenodd">
                            <rect width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="24.015" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="48.029" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="72.044" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="96.059" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="120.073" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="144.088" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="168.103" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="31.002" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="62.003" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="93.005" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                            <rect x="124.007" y="192.117" width="6.002" height="6.005" rx="3.001"></rect>
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
