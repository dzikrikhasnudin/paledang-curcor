<div>

    @if (session()->has('message'))
    <div id="success-alert"
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            <span class="font-semibold">Berhasil!</span> {{ session('message') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#success-alert" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <div class="flex justify-end items-center bg-gray-50 dark:bg-gray-900 p-3 mt-4 rounded-xl">
        <div>
            <button id="dropdownPilihTahun" data-dropdown-toggle="dropdownTahun"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Tahun: {{ $currentYear ?? $year }} <i class="bi bi-caret-down ms-3"></i>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownTahun"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-48 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 text-center "
                    aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('keuangan.arsip', 2025) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2025</a>
                    </li>
                    <li>
                        <a href="{{ route('keuangan.arsip', 2024) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2024</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="px-3 grid w-full grid-cols-1 gap-4  xl:grid-cols-3">
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Saldo</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                    @if ($balance < 0) - @rupiah($balance * -1) @else @rupiah($balance) @endif </span>
            </div>
            <i class="fa-solid fa-money-bill-transfer text-4xl text-primary-600"></i>
        </div>
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pendapatan</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">@rupiah($incomes->sum('amount'))</span>
            </div>
            <i class="fa-solid fa-sack-dollar text-4xl text-teal-500"></i>
        </div>
        <div
            class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pengeluaran</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">@rupiah($expenses->sum('amount'))</span>
            </div>
            {{-- <i class="bi bi-cash text-6xl text-red-600"></i> --}}
            <svg class="w-16 h-16 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>

        </div>

    </div>

    <section class=" bg-gray-50 dark:bg-gray-900 p-3 rounded-xl min-h-screen">
        <div class="space-y-3 mx-auto">
            <!-- Start coding here -->

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row md:items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class=" lg:mb-0 text-left">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Transaksi</h3>
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Rincian penggunaan
                            dana</span>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="grid grid-cols-6 gap-2 items-center justify-between">
                            {{--
                            <button type="button"
                                wire:click="$dispatch('openModal', { component: 'transaction.bulk-delete'})"
                                class="flex items-center justify-center text-gray-800 bg-gray-50 border border-gray-300 hover:bg-red-600 hover:text-white transition duration-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm p-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-red-800">
                                <i class="bi bi-trash"></i>
                            </button>
                            --}}
                            <button type="button"
                                wire:click="$dispatch('openModal', { component: 'transaction.export'})"
                                class="flex items-center justify-center text-gray-800 bg-gray-50 border border-gray-300 hover:bg-gray-700 hover:text-white transition duration-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm p-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <i class="bi bi-printer text-md"></i>
                            </button>
                            <select id="month" wire:model.live.debounce.300ms='month'
                                class="w-full col-span-2 items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-4">
                                <option>Filter</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <div
                                class="w-full col-span-2 md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ route('keuangan.create') }}"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <i class="bi bi-plus me-1 text-xl"></i>
                                    Transaksi
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <hr class="mb-3">
                <div class="overflow-x-auto">
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

                                <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->description }}
                                </td>
                                <td
                                    class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white text-end">
                                    @if($transaction->category == "Pendapatan")
                                    <span class="text-teal-500">+@rupiah($transaction->amount)</span>
                                    @else
                                    <span class="text-red-600">-@rupiah($transaction->amount)</span>
                                    @endif
                                </td>
                                <td
                                    class="p-4 text-sm font-normal text-center text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $transaction->date->translatedFormat('d F Y') }}
                                </td>
                                <td class="p-4 flex items-center justify-end">
                                    <a href="{{ route('keuangan.edit', $transaction->id) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    @if ($transaction->image)
                                    <button type="button"
                                        wire:click="$dispatch('openModal', { component: 'transaction.image', arguments: { transaction: {{ $transaction->id }} }})"
                                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                        <i class="bi bi-card-image"></i>
                                    </button>
                                    @else
                                    <button type="button"
                                        class="cursor-not-allowed text-white bg-teal-200  font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-teal-300  ">
                                        <i class="bi bi-card-image"></i>
                                    </button>
                                    @endif
                                    <button type="button" wire:click="$dispatch('triggerDelete',{{ $transaction->id }})"
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
                <nav class=" space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    {{ $transactions->links(data: ['scrollTo' => false]) }}
                </nav>
            </div>
        </div>
    </section>
</div>

@push('style')
<script src="{{ asset('vendor/lightbox2/dist/css/lightbox.min.css') }}"></script>
@endpush

@push('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('vendor/lightbox2/dist/js/lightbox.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', transactionId => {
            Swal.fire({
                title: 'Yakin hapus data?',
                text: 'Data transaksi akan dihapus permanen!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#E12425',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Hapus saja!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy', transactionId)
             // success response
                    Swal.fire({title: 'Data transaksi berhasil dihapus!', icon: 'success'});
                }
            });
        });
    });
</script>
@endpush