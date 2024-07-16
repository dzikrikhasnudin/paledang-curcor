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

    <div class="px-3 grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3">
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
                <div class="mb-4 lg:mb-0 p-3">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Transaksi</h3>
                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">Rincian penggunaan dana</span>
                </div>
                <hr class="mx-3">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" wire:model.live.debounce.300ms='cari'
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="grid grid-cols-2 gap-2 items-center justify-between">
                            <select id="month" wire:model.live.debounce.300ms='month'
                                class="w-full items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-4">
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
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ route('keuangan.create') }}"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <i class="bi bi-plus me-1 text-xl"></i>
                                    Tambah Transaksi
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
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