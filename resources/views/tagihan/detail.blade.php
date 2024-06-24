<div>
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Detail Tagihan - {{ $invoice->month }}
                @if ($invoice->status == 'paid')
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium mx-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Lunas</span>
                @else
                <span
                    class="bg-red-100 text-red-800 text-xs font-medium mx-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Belum
                    Lunas</span>
                @endif
            </h3>
            <button wire:click="$dispatch('closeModal')"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 lg:p-6">
            <div class="flex justify-between mb-4">
                <div>
                    <h4 class="font-bold text-lg text-gray-700 dark:text-gray-50">{{ $invoice->client->name }}</h4>
                    <p class="dark:text-gray-300">{{ $invoice->client->address }}</p>
                </div>
                <div><small class="dark:text-gray-50">{{ $date->translatedFormat('l, d F Y') }}</small></div>
            </div>
            <div class="flex justify-between mb-1 dark:text-gray-300">
                <p>Jumlah Meter Air</p>
                <p class="font-semibold text-gray-900 dark:text-gray-300">{{ $invoice->total_meter }} m<sup>3</sup></p>
            </div>
            <div class="flex justify-between mb-1 dark:text-gray-300">
                <p>Pemakaian </p>
                <p class="font-semibold text-gray-900 dark:text-gray-300">{{ $invoice->usage }} m<sup>3</sup></p>
            </div>

            <div class="flex justify-between mt-4 font-bold text-md text-gray-700 dark:text-gray-50">
                <p>Jumlah Tagihan</p>
                <p>Rp{{ number_format($invoice->amount, 0, ',', '.'); }}</p>
            </div>
            <hr class="my-4">

            <div class="flex justify-end gap-3">

                <a href="{{ route('tagihan.edit', $invoice->id) }}"
                    class="flex items-center justify-center text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-amber-600 dark:hover:bg-amber-700 focus:outline-none dark:focus:ring-amber-800">
                    Edit
                </a>
                <a href="{{ route('tagihan.create') }}"
                    class="flex items-center justify-center text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                    Tandai Sudah Lunas
                </a>
            </div>
        </div>
    </div>
</div>
