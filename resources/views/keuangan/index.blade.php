<div class="p-3 space-y-3">
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3">
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Saldo</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                    @if ($balance < 0) - @rupiah($balance * -1) @else @rupiah($balance) @endif </span>
            </div>
            <x-solar-money-bag-broken class="w-16 h-16 text-primary-600" />
        </div>
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pendapatan</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">@rupiah($incomes->sum('amount'))</span>
            </div>
            <x-iconsax-bro-money-recive class="w-16 h-16 text-teal-500" />
        </div>
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pengeluaran</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">@rupiah($expenses->sum('amount'))</span>
            </div>
            <x-iconsax-bro-money-send class="w-16 h-16 text-red-600" />

        </div>

    </div>

    <section class="bg-gray-50 dark:bg-gray-900 rounded-xl min-h-screen">
        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <!-- Card header -->
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Transaksi</h3>
                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">Rincian penggunaan dana</span>
                </div>
                <div class="items-center sm:flex">
                    <select id="month"
                        class="flex items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-4">
                        <option selected>Filter</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                    <button type="button" wire:click="$dispatch('openModal', { component: 'transaction.create' })"
                        class="flex items-center justify-center text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                        <i class="bi bi-plus me-1 text-xl"></i>
                        Tambah Transaksi
                    </button>
                </div>
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>

                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Keterangan
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-end text-gray-500 uppercase dark:text-white">
                                            Jumlah
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-center text-gray-500 uppercase dark:text-white">
                                            Tanggal
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-right text-gray-500 uppercase dark:text-white">
                                            <span class="sr-only">Aksi</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    @forelse ($transactions as $index => $transaction)
                                    <tr @if($loop->even) class="bg-gray-50 dark:bg-gray-700" @endif>

                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $transaction->description }}
                                        </td>
                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white text-end">
                                            @if($transaction->category == "Pendapatan")
                                            <span class="text-teal-500">@rupiah($transaction->amount)</span>
                                            @else
                                            <span class="text-red-600">-@rupiah($transaction->amount)</span>
                                            @endif
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-center text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $transaction->date->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="p-4 flex items-center justify-end">
                                            <button type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Detail
                                                <span class="sr-only">Icon description</span>
                                            </button>
                                            @if ($transaction->image)
                                            <button type="button"
                                                class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                                <i class="bi bi-card-image"></i>
                                            </button>
                                            @else
                                            <button type="button"
                                                class="cursor-not-allowed text-white bg-teal-200  font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-teal-300  ">
                                                <i class="bi bi-card-image"></i>
                                            </button>
                                            @endif
                                            <button type="button"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3"
                                            class="p-4 font-semibold text-gray-900 whitespace-nowrap dark:text-white border-b text-center">
                                            Belum ada data
                                        </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                        <nav class=" space-y-3 md:space-y-0 p-4 " aria-label="Table navigation">
                            {{ $transactions->links(data: ['scrollTo' => false]) }}
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Card Footer -->

        </div>
    </section>
</div>