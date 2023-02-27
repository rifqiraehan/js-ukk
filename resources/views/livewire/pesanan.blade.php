<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">

        {{-- New --}}
        <div class="flex justify-between lg:px-0 px-6 mb-3 gap-6 align-middle">
            <div class="relative text-gray-700 focus-within:text-gray-600">
                <select wire:model="statusFilter" id="statusFilter" class="py-2 px-4 text-sm text-gray bg-gray-100 rounded-md focus:outline-none focus:bg-gray-200 focus:text-gray-700">
                    <option value="">All</option>
                    <option value="Menunggu Konfirmasi">Belum Dikonfirmasi</option>
                    <option value="Pesanan Dikonfirmasi">Pesanan Dikonfirmasi</option>
                    <option value="Pesanan Siap">Pesanan Siap</option>
                    <option value="Pesanan Selesai">Pesanan Selesai</option>
                    <option value="Pesanan Dibatalkan">Pesanan Dibatalkan</option>
                </select>
            </div>
            <div class="relative text-gray-700 focus-within:text-gray-600">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                    <input wire:model="search" type="search"
                    class="py-2 text-sm text-gray
                    bg-gray-100 rounded-md pl-10 focus:outline-none
                    focus:bg-gray-200 focus:text-gray-700 search"
                    placeholder="{{ __('Search...') }}"
                    autocomplete="off">
                </div>
            </div>
        </div>


        <div class="flex flex-col">
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
                                    <th scope="col" width="200"
                                        class="px-2 px-1 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" width="200"
                                        class="px-2 px-1 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($orders->count() > 0)
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center px-3 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $loop->iteration + $orders->firstItem() - 1 }}
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

                                        {{-- <td class="py-4 whitespace-nowrap text-sm text-gray-900">
                                            @foreach ($order->orderItems as $item)
                                                {{ $item->product->name }} (x{{ $item->quantity }})<br>
                                            @endforeach
                                        </td> --}}

                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($order->total, 0, '.', '.') }}
                                        </td>

                                        <td class="pr-8 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <p class="text-base font-bold">
                                                <span
                                                    class="px-2 text-base font-semibold rounded-full whitespace-nowrap
                                                @if ($order->orderStatus->id == 1) bg-gray-200 text-gray-800
                                                @elseif ($order->orderStatus->id == 2)
                                                bg-yellow-100 text-yellow-800
                                                @elseif ($order->orderStatus->id == 3)
                                                bg-green-100 text-green-800
                                                @elseif ($order->orderStatus->id == 4)
                                                bg-purple-100 text-purple-800
                                                @else
                                                bg-red-100 text-red-800 @endif
                                            ">
                                                    {{ $order->orderStatus->status }}
                                                </span>
                                            </p>
                                        </td>


                                        <td class="pr-8 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <a href="{{ route('penjual.order.show', $order->id) }}"
                                                class="text-base font-medium underline">
                                                Detail
                                            </a>
                                        </td>

                                        {{-- <td class="pr-8 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <select class="form-control">
                                                @foreach(['Menunggu Konfirmasi', 'Pesanan Dikonfirmasi', 'Pesanan Siap', 'Pesanan Selesai', 'Pesanan Dibatalkan'] as $status)
                                                    <option value="{{ $status }}" {{ ($order->orderStatus->status) == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td> --}}


                                        {{-- <td class="pr-8 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <select class="form-control" wire:model="status" wire:change="updatedStatus($event.target.value, {{ $order->id }})">
                                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                <option value="Pesanan Dikonfirmasi">Pesanan Dikonfirmasi</option>
                                                <option value="Pesanan Siap">Pesanan Siap</option>
                                                <option value="Pesanan Selesai">Pesanan Selesai</option>
                                                <option value="Pesanan Dibatalkan">Pesanan Dibatalkan</option>
                                            </select>
                                        </td> --}}

                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center py-4 whitespace-nowrap text-sm text-gray-900">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="py-4 mx-6">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
