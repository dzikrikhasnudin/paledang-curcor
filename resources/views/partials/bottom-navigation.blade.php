<div
    class="fixed md:hidden bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600">
    <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">

        <x-bottom-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <i class="bi bi-house-door-fill text-2xl group-hover:text-blue-600"></i>
            <span class="text-sm group-hover:text-blue-600 ">Home</span>
        </x-bottom-nav-link>

        <x-bottom-nav-link href="{{ route('keuangan.index') }}" :active="request()->routeIs('keuangan.*')">
            <i class="bi bi-coin text-2xl group-hover:text-blue-600"></i>
            <span class="text-sm group-hover:text-blue-600 ">Keuangan</span>
        </x-bottom-nav-link>

        <x-bottom-nav-link href="{{ route('pelanggan.index') }}" :active="request()->routeIs('pelanggan.*')">
            <i class="bi bi-people-fill text-2xl group-hover:text-blue-600"></i>
            <span class="text-sm group-hover:text-blue-600 ">Pelanggan</span>
        </x-bottom-nav-link>

        <x-bottom-nav-link href="{{ route('tagihan.index') }}" :active="request()->routeIs('tagihan.*')">
            <i class="bi bi-credit-card-2-back-fill text-2xl group-hover:text-blue-600 "></i>
            <span class="text-sm group-hover:text-blue-600 ">Tagihan</span>
        </x-bottom-nav-link>
    </div>
</div>