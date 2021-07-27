<div class="w-64 bg-white h-screen border-r flex-none border-gray-100 shadow-2xl">
    <div class="h-20 flex flex-none flex-col justify-center border-b border-gray-100">
        <h2 class="text-sm font-light px-6 truncate uppercase">
            @yield('sidebar-title')
        </h2>
    </div>
    <div class="py-6 w-full">
        @yield('sidebar-body')
    </div>
</div>
