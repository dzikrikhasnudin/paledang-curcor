<div class="p-3 space-y-3">
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-3">
        <div
            class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Saldo</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">Rp1.234.567</span>

            </div>
        </div>
        <div
            class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pendapatan</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">Rp2.000.000</span>

            </div>

        </div>
        <div
            class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pengeluaran</h3>
                <span
                    class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">Rp1.500.000</span>

            </div>

        </div>

    </div>

    <section class="bg-gray-50 dark:bg-gray-900  rounded-xl min-h-screen">
        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <!-- Card header -->
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Transaksi</h3>
                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">Rincian penggunaan dana</span>
                </div>
                <div class="items-center sm:flex">
                    <select id="countries"
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

                </div>
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Keterangan
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Amount
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Date &amp; Time
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    <tr>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment from <span class="font-semibold">Bonnie Green</span>
                                        </td>
                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $2300
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 23 ,2021
                                        </td>

                                    </tr>
                                    <tr class="bg-gray-50 dark:bg-gray-700">
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment refund to <span class="font-semibold">#00910</span>
                                        </td>
                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            -$670
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 23 ,2021
                                        </td>


                                    </tr>
                                    <tr>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment failed from <span class="font-semibold">#087651</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $234
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 18 ,2021
                                        </td>


                                    </tr>
                                    <tr class="bg-gray-50 dark:bg-gray-700">
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment from <span class="font-semibold">Lana Byrd</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $5000
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 15 ,2021
                                        </td>

                                    </tr>
                                    <tr>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment from <span class="font-semibold">Jese Leos</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $2300
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 15 ,2021
                                        </td>

                                    </tr>
                                    <tr class="bg-gray-50 dark:bg-gray-700">
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Refund to <span class="font-semibold">THEMESBERG LLC</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            -$560
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 11 ,2021
                                        </td>

                                    </tr>

                                    <tr>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment from <span class="font-semibold">Lana Lysle</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $1437
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 6 ,2021
                                        </td>

                                    </tr>
                                    <tr class="bg-gray-50 dark:bg-gray-700">
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment to <span class="font-semibold">Joseph Mcfall</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $980
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Apr 1 ,2021
                                        </td>


                                    </tr>
                                    <tr>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment from <span class="font-semibold">Alphabet LLC</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $11,436
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Mar 23 ,2021
                                        </td>

                                    </tr>
                                    <tr class="bg-gray-50 dark:bg-gray-700">
                                        <td
                                            class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            Payment from <span class="font-semibold">Bonnie Green</span>
                                        </td>

                                        <td
                                            class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                            $560
                                        </td>
                                        <td
                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            Mar 23 ,2021
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Footer -->

        </div>
    </section>
</div>