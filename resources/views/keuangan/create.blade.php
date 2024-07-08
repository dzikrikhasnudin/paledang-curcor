<div class="p-3 lg:max-w-4xl mx-auto">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-6 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Transaksi</h2>
            <form class="p-4 md:p-5" wire:submit='save'>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="client"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select id="client" wire:model='category'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Pilih Kategori</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                            <option value="Pemasukan">Pemasukan</option>

                        </select>
                    </div>

                    <div class="relative sm:col-span-2">
                        <label for="default-datepicker"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker id="default-datepicker" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Pilih tanggal">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                        <input wire:model='description' type="text" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan keterangan pemasukan/pengeluaran" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input wire:model='amount' type="number" min="0" step="any" id="amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Masukkan jumlah" required>
                    </div>

                    <div class="w-full sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Bukti
                            Transaksi (opsional)</label>
                        <input wire:model='image'
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" type="file">

                        @if ($image)
                        <hr class="my-4">
                        <img src="{{ $image->temporaryUrl() }}"
                            class="lg:w-1/2 rounded-lg aspect-square object-cover mx-auto">
                        @endif
                    </div>
                </div>
                <hr class="my-4">
                <div class="flex gap-2 justify-end">
                    <button type="button" wire:click="$dispatch('closeModal')"
                        class="inline-flex items-center px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                        Kembali
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
