<div class="p-3 lg:max-w-4xl mx-auto">
    <section class="bg-white dark:bg-gray-900 rounded-lg">
        <div class="py-4 text-center">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Status Pembayaran</h2>
        </div>
        <hr class="my-3">
        <div class="p-3">
            <div class="grid grid-cols-3 ">
                <p class="flex justify-between"><span>Nama Lengkap</span> <span class="text-end">:</span></p>
                <p class="col-span-2 ml-1">{{ $clientName }}</p>
            </div>
            <div class="grid grid-cols-3 ">
                <p class="flex justify-between"><span>Alamat</span> <span class="text-end">:</span></p>
                <p class="col-span-2 ml-1"> {{ $clientAddress }}</p>
            </div>
            <div class="grid grid-cols-3 ">
                <p class="flex justify-between"><span>Jumlah Meter</span> <span class="text-end">:</span></p>
                <p class="col-span-2 ml-1">{{ $currentMeter }} m<sup>3</sup></p>
            </div>
            <div class="grid grid-cols-3 ">
                <p class="flex justify-between"><span>Pemakaian</span> <span class="text-end">:</span></p>
                <p class="col-span-2 ml-1">{{ $usage }} m<sup>3</sup></p>
            </div>
            <div class="grid grid-cols-3 ">
                <p class="flex justify-between"><span>Jumlah Tagihan</span> <span class="text-end">:</span></p>
                <p class="col-span-2 ml-1">Rp{{ number_format($amount, 0, ',', '.'); }} m<sup>3</sup></p>
            </div>
        </div>
    </section>
</div>
