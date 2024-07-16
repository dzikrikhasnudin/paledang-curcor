<div>
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-3 md:p-4 border-b rounded-t dark:border-gray-600">
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Bukti Transaksi
                </h3>
                <p>{{ $transaction->description }}</p>
            </div>

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
            <div><img src="{{ asset('storage/' . $transaction->image) }}" class="rounded aspect-square object-cover"
                    alt="{{ $transaction->description }}"></div>
        </div>
    </div>
</div>