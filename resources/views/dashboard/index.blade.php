<div>
    <div class="p-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
            <div class="rounded-lg border-gray-300 dark:border-gray-600">
                <div
                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 min-h-96 h-full">
                    <h3 class="flex items-center mb-4 text-xl font-bold text-gray-900 dark:text-white">Transaksi Terbaru
                    </h3>

                    <ul class="text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg flex dark:divide-gray-600 dark:text-gray-400"
                        id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                        <li class="w-full">
                            <button id="income-tab" data-tabs-target="#income" type="button" role="tab"
                                aria-controls="faq" aria-selected="true"
                                class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300">Pendapatan</button>
                        </li>
                        <li class="w-full">
                            <button id="expense-tab" data-tabs-target="#expense" type="button" role="tab"
                                aria-controls="expense" aria-selected="false"
                                class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500">Pengeluaran</button>
                        </li>
                    </ul>
                    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                        <div class="pt-4 hidden" id="income" role="tabpanel" aria-labelledby="income-tab">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($incomes as $income)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center gap-2 justify-between">
                                        <div class="flex items-center min-w-0">
                                            <div class="ml-3">
                                                <p class="font-medium text-gray-900 dark:text-white">
                                                    {{$income->description }}
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-teal-500 dark:text-white">
                                            @rupiah($income->amount)
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center justify-center">Belum ada data pendapatan</div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="pt-4" id="expense" role="tabpanel" aria-labelledby="expense-tab">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($expenses as $expense)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center gap-2 justify-between">
                                        <div class="flex items-center min-w-0">
                                            <div class="ml-3">
                                                <p class="font-medium text-gray-900 dark:text-white">
                                                    {{$expense->description }}
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-red-600 dark:text-white">
                                            @rupiah($expense->amount)
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center justify-center">Belum ada data pendapatan</div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div
                        class="flex items-center justify-end pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                        <div class="flex-shrink-0">
                            <a href="{{ route('keuangan.index') }}"
                                class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                                Semua Transaksi
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-lg border-gray-300 dark:border-gray-600">
                <div
                    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800 min-h-96 h-full">
                    <h3 class="flex items-center mb-4 text-xl font-bold text-gray-900 dark:text-white">Tagihan Terbaru
                    </h3>
                    <div class="border-t border-gray-200 dark:border-gray-600">
                        <div class="pt-4">
                            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($invoices as $invoice)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center min-w-0">
                                            <div class="ml-3">
                                                <p wire:click="$dispatch('openModal', { component: 'invoice.detail', arguments: { invoice: {{ $invoice->id }} }})"
                                                    class="cursor-pointer hover:underline font-medium text-gray-900 dark:text-white">
                                                    {{ $invoice->client->name }}
                                                </p>
                                                <div class="flex items-center flex-1 text-sm text-gray-500">
                                                    {{ $invoice->client->address }} - Bulan {{ $invoice->month }}
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-red-700 dark:text-white">
                                            @rupiah($invoice->amount)
                                        </div>
                                    </div>
                                </li>
                                @empty

                                @endforelse

                            </ul>
                        </div>
                    </div>
                    <!-- Card Footer -->
                    <div
                        class="flex items-center justify-end pt-3 mt-5 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                        <div class="flex-shrink-0">
                            <a href="{{ route('tagihan.index') }}"
                                class="inline-flex  items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                                Lihat semua tagihan
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
    </div>
</div>