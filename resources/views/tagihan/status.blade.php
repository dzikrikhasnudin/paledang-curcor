<div class="p-3 lg:max-w-4xl mx-auto">
    <section class="bg-white dark:bg-gray-900 rounded-lg">
        <div class="p-4 text-center flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Status Pembayaran</h2>
            <p>
                @if ($status == 'paid')
                <span
                    class="bg-green-100 text-green-800 font-medium text-base  px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Lunas</span>
                @else
                <span
                    class="bg-red-100 text-red-800 font-medium text-base px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Belum
                    Lunas</span>
                @endif
            </p>
        </div>
        <hr class="my-1">
        <div class="p-4 lg:p-6">
            <div class="flex justify-between mb-4">
                <div>
                    <h4 class="font-bold text-lg text-gray-700 dark:text-gray-50">{{ $clientName }}</h4>
                    <p class="dark:text-gray-300">{{ $clientAddress }}</p>
                </div>
                <div><small class="dark:text-gray-50">{{ $date->translatedFormat('l, d F Y') }}</small></div>
            </div>
            <div class="flex justify-between mb-1 dark:text-gray-300">
                <p>Jumlah Meter Air</p>
                <p class="font-semibold text-gray-900 dark:text-gray-300">{{ $currentMeter }} m<sup>3</sup></p>
            </div>
            <div class="flex justify-between mb-1 dark:text-gray-300">
                <p>Pemakaian </p>
                <p class="font-semibold text-gray-900 dark:text-gray-300">{{ $usage }} m<sup>3</sup></p>
            </div>

            <div class="flex justify-between mt-4 font-bold text-md text-gray-700 dark:text-gray-50">
                <p >Jumlah Tagihan</p>
                <p >Rp{{ number_format($amount, 0, ',', '.'); }}</p>
            </div>
            <hr class="my-4">

            @if ($image)
            <img src="{{ asset('storage/'. $image) }}" class="rounded" alt="">
            <hr class="my-4">
            @endif

            <div class="flex justify-end gap-3">

            <a href="{{ route('tagihan.index') }}"
            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
            Kembali
            </a>
            <a href="{{ route('tagihan.create') }}"
            class="flex items-center justify-center text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
            Tandai Sudah Lunas
            </a>
            </div>

        </div>
    </section>
</div>
