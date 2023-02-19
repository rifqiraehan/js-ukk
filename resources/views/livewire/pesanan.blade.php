<div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
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
                                        class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pesan
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pembeli
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Produk
                                    </th>
                                    <th scope="col" width="200"
                                        class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total
                                    </th>
                                    <th scope="col" width="200"
                                        class="px-1 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center px-3 py-4 whitespace-nowrap text-sm text-gray-900">

                                            {{ $loop->iteration + $orders->firstItem() - 1 }}
                                        </td>

                                        <td class="py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $order->created_at->format('j M Y') }},
                                            {{ $order->created_at->format('H:i') }} WIB
                                        </td>

                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $order->user->name }} <br>
                                            <span class="text-gray-500">{{ $order->user->kelas }}
                                                {{ $order->user->jurusan }}</span>
                                        </td>

                                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @foreach ($order->orderItems as $item)
                                                {{ $item->product->name }} (x{{ $item->quantity }})<br>
                                            @endforeach
                                        </td>

                                        <td class="py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($order->total, 0, '.', '.') }}
                                        </td>

                                        <td class="pr-8 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <select class="form-control">
                                                <option value="Menunggu Konfirmasi"
                                                    {{ ($order->orderStatus->status) == 'Menunggu Konfirmasi' ? 'selected' : '' }}>
                                                    Menunggu Konfirmasi</option>
                                                <option value="Pesanan Dikonfirmasi"
                                                    {{ ($order->orderStatus->status) == 'Pesanan Dikonfirmasi' ? 'selected' : '' }}>
                                                    Pesanan Dikonfirmasi</option>
                                                <option value="Pesanan Siap"
                                                    {{ ($order->orderStatus->status) == 'Pesanan Siap' ? 'selected' : '' }}>
                                                    Pesanan Siap</option>
                                                <option value="Pesanan Selesai"
                                                    {{ ($order->orderStatus->status) == 'Pesanan Selesai' ? 'selected' : '' }}>
                                                    Pesanan Selesai</option>
                                                <option value="Pesanan Dibatalkan"
                                                    {{ ($order->orderStatus->status) == 'Pesanan Dibatalkan' ? 'selected' : '' }}>
                                                    Pesanan Dibatalkan</option>
                                            </select>
                                        </td>

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
