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
                        {{ __('Terima kasih telah melakukan registrasi, silahkan periksa email untuk menyelesaikan proses pendaftaran.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Link verifikasi berhasil terkirim, silahkan periksa email anda.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 focus:bg-teal-800 focus:outline-none w-full sm:w-auto bg-teal-700 transition duration-150 ease-in-out hover:bg-teal-600 rounded text-white px-8 py-3 text-sm"
                                    type="submit">
                                    {{ __('Kirim Ulang Link Verifikasi') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Keluar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="
                 w-full
                 lg:w-1/2
                 bg-gradient-to-tl
                 from-teal-500
                 to-teal-600
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
                        Verifikasi Email
                    </h3>
                    <p class="text-xl text-white leading-normal pt-3 xl:w-10/12">
                        Silahkan cek email anda untuk menyelesaikan pendaftaran.
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
