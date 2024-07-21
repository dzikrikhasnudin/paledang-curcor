<div>

    <section class=" bg-gray-50 dark:bg-gray-900 p-3 rounded-xl min-h-screen">
        <div class="space-y-3 mx-auto">
            <!-- Start coding here -->

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <h2 class="text-xl font-bold text-center py-2 lg:py-4 lg:text-2xl lg:text-left dark:text-white px-3">
                    Data Pengurus</h2>
                <hr class="mx-3">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No.</th>
                                <th wire:click="doSort('name')" scope="col " class="px-4 py-3 cursor-pointer">Nama
                                    Pengguna</th>
                                <th scope="col" class="px-4 py-3 cursor-pointer">Email</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $user)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ ($users->currentpage()-1) * $users->perpage() +
                                    $loop->index + 1 }}
                                </td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}</th>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3 space-x-2 whitespace-nowrap text-end">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <i class="bi bi-person-fill-gear"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-6 text-center" colspan="4">Belum ada ada</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <nav class=" space-y-3 md:space-y-0 p-4 " aria-label="Table navigation">
                    {{ $users->links(data: ['scrollTo' => false]) }}
                </nav>
            </div>
        </div>
    </section>


</div>
