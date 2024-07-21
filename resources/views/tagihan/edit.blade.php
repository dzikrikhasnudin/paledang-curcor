<div class="p-3 lg:max-w-4xl mx-auto">
    <section class="bg-white dark:bg-gray-900">
        <div class="py-6 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Data Tagihan</h2>
            <form wire:submit='update'>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div>
                        <label for="client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Pelanggan</label>
                        <select id="client" wire:model='clientId'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Pilih Pelanggan</option>
                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name . ' (' .
                                $client->address . ') ' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="month"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bulan</label>
                        <select id="month" wire:model='month'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Pilih Bulan</option>
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
                    </div>
                    <div class="sm:col-span-2">
                        <label for="meter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                            Meter (m<sup>3</sup>) </label>
                        <input wire:model='meter' type="number" min="0" step="any" id="meter"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Jumlah meter air" required>
                    </div>

                    <div class="w-full sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Tambah
                            Gambar (opsional)</label>
                        <input wire:model='newImage'
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="image" type="file">
                        @if ($newImage)
                        <hr class="my-4">
                        <img src="{{ $newImage->temporaryUrl() }}"
                            class="rounded-lg lg:w-1/2 mx-auto aspect-square object-cover">
                        @elseif ($image != null)
                        <hr class="my-4">
                        <img src="{{ asset('storage/' . $image) }}"
                            class="rounded-lg lg:w-1/2 mx-auto aspect-square object-cover">
                        @endif
                    </div>
                </div>
                <hr class="my-4">
                <div class="flex gap-2 justify-end">
                    <a href="{{ route('tagihan.index') }}"
                        class="inline-flex items-center px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                        Kembali
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Ubah
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>