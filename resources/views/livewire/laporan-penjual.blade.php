<div>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Penjualan
        </h2>
    </x-slot>

    <section class="container px-4 mx-auto mt-6">

        <div class="mt-6 md:flex md:items-center md:justify-between no-print">
            <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                <button wire:click="selectDateRange('hari-ini')"
                    class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 {{ $selectedDateRange === 'hari-ini' ? 'bg-gray-100' : '' }} sm:text-sm">
                    Hari ini
                </button>

                <button wire:click="selectDateRange('minggu-ini')"
                    class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 {{ $selectedDateRange === 'minggu-ini' ? 'bg-gray-100' : '' }} sm:text-sm hover:bg-gray-100">
                    Minggu ini
                </button>

                <button wire:click="selectDateRange('bulan-ini')"
                    class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 {{ $selectedDateRange === 'bulan-ini' ? 'bg-gray-100' : '' }} sm:text-sm hover:bg-gray-100">
                    Bulan ini
                </button>
            </div>


            <div>
                <a href="#" onclick="window.print(); return false;">
                    <button
                        class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                            <path d="M7 11l5 5l5 -5"></path>
                            <path d="M12 4l0 12"></path>
                        </svg>

                        <span>Simpan</span>
                    </button>
                </a>
            </div>
        </div>


        <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 w-full whitespace-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" width="50"
                                        class="text-center px-3 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pesan
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pembeli
                                    </th>
                                    <th scope="col" width="200"
                                        class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($orders->count() > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="text-center px-3 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $order->created_at->format('j M Y') }},
                                                {{ $order->created_at->format('H:i') }} WIB
                                            </td>

                                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $order->user->name }} <br>
                                                <span class="text-gray-500">{{ $order->user->kelas }}
                                                    {{ $order->user->jurusan }}</span>
                                            </td>

                                            <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Rp {{ number_format($order->total, 0, '.', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                                    <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900"></td>
                                    <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900 font-bold">
                                        Total Pendapatan
                                    </td>
                                    <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Rp {{ number_format($totalRevenue, 0, ',', '.') }}
                                    </td>
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center py-4 whitespace-nowrap text-sm text-gray-900">
                                            Tidak ada data yang tersedia untuk periode ini.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
