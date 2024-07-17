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

    <section class=" bg-gray-50 dark:bg-gray-900 p-3 rounded-xl min-h-screen">
        <div class="space-y-3 mx-auto">
            <!-- Start coding here -->

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <h2 class="text-xl font-bold text-center py-2 lg:py-4 lg:text-2xl lg:text-left dark:text-white px-3">
                    Data Tagihan</h2>
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

                        <div class="grid grid-cols-5 gap-2 items-center justify-between">
                            <button type="button" wire:click="$dispatch('openModal', { component: 'invoice.export'})"
                                class="flex items-center justify-center text-gray-800 bg-gray-50 border border-gray-300 hover:bg-gray-700 hover:text-white transition duration-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm p-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <i class="bi bi-printer text-md"></i>
                            </button>
                            <select id="month" wire:model.live.debounce.300ms='month'
                                class="w-full col-span-2 items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Filter</option>
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
                            <div
                                class="w-full md:w-auto flex flex-col col-span-2 md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ route('tagihan.create') }}"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                    <i class="bi bi-plus me-1 text-xl"></i>
                                    Catat Meter
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th scope="col" class="px-4 py-3">Nama Pelanggan</th>
                                <th scope="col" class="px-4 py-3">Alamat</th>
                                <th scope="col" class="px-4 py-3">Bulan</th>
                                <th scope="col" class="px-4 py-3">Jumlah Tagihan</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $invoice)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ ($invoices->currentpage()-1) * $invoices->perpage() +
                                    $loop->index + 1 }}</td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a wire:click="$dispatch('openModal', { component: 'invoice.history', arguments: { client: {{ $invoice->client_id }} }})"
                                        class="cursor-pointer hover:underline hover:text-blue-700 transition duration-200">{{
                                        $invoice->client->name }}</a>
                                </th>
                                <td class="px-4 py-3 text-nowrap">{{ $invoice->client->address }}</td>
                                <td class="px-4 py-3">{{ $invoice->month }}</td>
                                <td class="px-4 py-3">{{ 'Rp'. number_format($invoice->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3 text-nowrap">
                                    @if ($invoice->status == 'paid')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Lunas</span>
                                    @else
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Belum
                                        Lunas</span>
                                    @endif

                                </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button type="button"
                                        wire:click="$dispatch('openModal', { component: 'invoice.detail', arguments: { invoice: {{ $invoice->id }} }})"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Detail
                                        <span class="sr-only">Icon description</span>
                                    </button>
                                    @if ($invoice->image)
                                    <button type="button"
                                        wire:click="$dispatch('openModal', { component: 'invoice.image', arguments: { invoice: {{ $invoice->id }} }})"
                                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                        <i class="bi bi-card-image"></i>
                                    </button>
                                    @else
                                    <button type="button"
                                        class="cursor-not-allowed text-white bg-teal-200  font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-teal-300  ">
                                        <i class="bi bi-card-image"></i>
                                    </button>
                                    @endif
                                    <button type="button" wire:click="$dispatch('triggerDelete',{{ $invoice->id }})"
                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-6 text-center" colspan="6">Belum ada ada</td>
                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                </div>
                <nav class=" space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    {{ $invoices->links(data: ['scrollTo' => false]) }}
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
        @this.on('triggerDelete', invoiceId => {
            Swal.fire({
                title: 'Yakin hapus data?',
                text: 'Data tagihan akan dihapus permanen!',
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
                    @this.call('destroy', invoiceId)
             // success response
                    Swal.fire({title: 'Data tagihan berhasil dihapus!', icon: 'success'});
                }
            });
        });
    });
</script>
@endpush