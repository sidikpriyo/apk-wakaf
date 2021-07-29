<div
    class="w-20 bg-gradient-to-bl from-blue-500 to-blue-600 text-white h-screen flex flex-none items-center justify-between flex-col text-center py-6">
    <div class="justify-center flex items-center w-full">
        <a href="{{ route('notifikasi') }}"
            class="hover:bg-blue-600 rounded-lg {{ strpos(url()->current(), 'notifikasi') ? 'bg-blue-500' : '' }}">
            <span class="py-3 justify-center flex items-center cursor-pointer mx-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path
                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                    </path>
                </svg>
            </span>
        </a>
    </div>
    <ul class="w-full flex flex-col justify-center space-y-1">
        <li
            class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'dashboard') ? 'bg-blue-500' : '' }}">
            <a href="{{ route('dashboard') }}" aria-current="page"
                class="nuxt-link-exact-active nuxt-link-active has-tooltip" data-original-title="null">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </a>
        </li>
        @can('pengelola', User::class)
            <li
                class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'kampanye') ? 'bg-blue-500' : '' }}">
                <a href="{{ route('pengelola-kampanye.index') }}" data-original-title="null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            <li
                class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'donasi') ? 'bg-blue-500' : '' }}">
                <a href="{{ route('pengelola-donasi.index') }}" data-original-title="null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd"
                            d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        @endcan
        @can('lembaga', User::class)
            <li
                class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'kampanye') ? 'bg-blue-500' : '' }}">
                <a href="{{ route('lembaga-kampanye.index') }}" data-original-title="null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            <li
                class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'donasi') ? 'bg-blue-500' : '' }}">
                <a href="{{ route('lembaga-donasi.index') }}" data-original-title="null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd"
                            d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        @endcan
        @can('donatur', User::class)
            <li
                class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'kampanye') ? 'bg-blue-500' : '' }}">
                <a href="{{ route('donatur-kampanye.index') }}" data-original-title="null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            <li
                class="hover:bg-blue-600 py-3 justify-center flex items-center cursor-pointer mx-4 rounded-lg {{ strpos(url()->current(), 'donasi') ? 'bg-blue-500' : '' }}">
                <a href="{{ route('donatur-donasi.index') }}" data-original-title="null">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                        <path fill-rule="evenodd"
                            d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
        @endcan
    </ul>

    <div class="justify-center flex flex-col items-center w-full space-y-8">
        <a href="{{ route('pengaturan') }}" title="Pengaturan"
            class="hover:bg-blue-600 rounded-lg {{ strpos(url()->current(), 'pengaturan') ? 'bg-blue-500' : '' }}">
            <span class="py-3 justify-center flex items-center cursor-pointer mx-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                    </path>
                </svg>
            </span>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                title="Keluar">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 325.214 325.214" xml:space="preserve" fill="currentColor"
                    class="h-5 w-5 text-white cursor-pointer has-tooltip" data-original-title="null">
                    <g>
                        <path
                            d="M288.777,93.565c-15.313-23.641-36.837-42.476-62.243-54.472c-1.616-0.763-3.109-1.134-4.564-1.134c-1.969,0-8.392,0.833-8.392,11.541v17.75c0,8.998,5.479,13.113,7.159,14.16c32.613,20.33,52.083,55.317,52.083,93.59c0,60.772-49.442,110.214-110.214,110.214S52.393,235.772,52.393,175c0-38.872,19.942-74.144,53.346-94.353c4.475-2.707,6.839-7.426,6.839-13.647V49c0-7.959-5.077-10.783-9.424-10.783c-1.714,0-3.542,0.422-5.144,1.188C72.781,51.471,51.42,70.305,36.237,93.872C20.638,118.084,12.393,146.137,12.393,175c0,82.828,67.386,150.214,150.214,150.214S312.821,257.828,312.821,175C312.821,146.008,304.507,117.848,288.777,93.565z">
                        </path>
                        <path
                            d="M152.579,117h21c5.514,0,10-4.486,10-10V10c0-5.514-4.486-10-10-10h-21c-5.514,0-10,4.486-10,10v97C142.579,112.514,147.064,117,152.579,117z">
                        </path>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg>
            </a>
        </form>
    </div>
</div>
