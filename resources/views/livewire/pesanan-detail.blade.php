<div>
    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                    <p class="font-bold text-lg mb-2">Detail Pesanan</p>
                    <p class="text-base">Tanggal Pesan : {{ $order->created_at->format('j M Y') }}, {{ $order->created_at->format('H:i') }}
                    <p class="text-base">Status Produk :<span
                            class="ml-2 px-2 inline-flex text-base font-semibold rounded-full
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
                        <hr class="my-4 border">
                    <p class="font-bold text-lg mb-2">Detail Pembeli</p>
                    <p class="text-base">Nama Pembeli : {{ $order->user->name }} ({{ $order->user->email }})
                    <p class="text-base">Kelas :<span
                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $order->user->kelas }} {{ $order->user->jurusan }}
                        </span>
                        <hr class="my-4 border">

                    <div>
                        @php
                            $itemsBySeller = [];

                            foreach ($order->orderItems as $item) {
                                $sellerName = $item->product->user->name;

                                if (!isset($itemsBySeller[$sellerName])) {
                                    $itemsBySeller[$sellerName] = [
                                        'totalQuantity' => 0,
                                        'products' => [],
                                    ];
                                }

                                $itemsBySeller[$sellerName]['totalQuantity'] += $item->quantity;
                                $itemsBySeller[$sellerName]['products'][] = $item;
                            }
                        @endphp

                        @foreach ($itemsBySeller as $sellerName => $items)
                            <p class="font-bold text-lg mb-2">Detail Pesanan</p>

                            @foreach ($items['products'] as $item)
                                <div class="grid grid-cols-2 w-full">
                                    <p>{{ $item->product->name }} (x{{ $item->quantity }})</p>
                                    <p class="grid justify-end">Rp {{ number_format($item->sub_total, 0, '.', '.') }}
                                    </p>
                                </div>
                            @endforeach

                            @if (!$loop->last)
                                <hr class="my-2 border">
                            @endif
                        @endforeach

                    </div>

                    <hr class="my-4 border">

                    <div class="mt-4 mb-2 flex justify-between">
                        <p class="text-gray-700">Total Harga
                            ({{ $order->orderItems->sum(fn($item) => $item->quantity) }} Barang)</p>
                        <p class="text-gray-700 ml-4">
                            Rp {{ number_format($order->total, 0, '.', '.') }}
                        </p>
                    </div>
                    <hr class="my-4 border">
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total Tagihan</p>
                        <div class="">
                            <p class="mb-1 text-lg font-bold">
                                Rp {{ number_format($order->total, 0, '.', '.') }}
                            </p>
                            </p>
                        </div>
                    </div>

                    <hr class="my-4 border">
                    <div class="flex justify-between">
                        {{-- Ubah status order id menjadi 2 ketika user menekan 'Konfirmasi', dan ubah status order id menjadi 5 ketika user menekan 'Batalkan' --}}
                        @if ($order->orderStatus->id == 1)
                            <p class="text-lg font-bold">Konfirmasi Pesanan?</p>
                            <div class="">
                                <x-button icon="check" positive label="Konfirmasi" wire:click="konfirmasiPesanan" /> <x-button icon="x" negative label="Batalkan" wire:click="batalkanPesanan" />
                            </div>

                        {{-- Ubah status order id menjadi 3 ketika user menekan 'Pesanan Siap' --}}
                        @elseif ($order->orderStatus->id == 2)
                            <p class="text-lg font-bold">Apakah pesanan siap?</p>
                            <div class="">
                                <x-button icon="check" positive label="Pesanan Siap" wire:click="pesananSiap"/>
                            </div>

                        {{-- Ubah status order id menjadi 4 ketika user menekan 'Pesanan Selesai' --}}
                        @elseif ($order->orderStatus->id == 3)
                            <p class="text-lg font-bold">Pesanan Selesai?</p>
                            <div class="">
                                <x-button icon="check" positive label="Pesanan Selesai" wire:click="pesananSelesai"/>
                            </div>

                        {{-- Tombol tidak memiliki aksi apapun --}}
                        @elseif ($order->orderStatus->id == 4)
                            <p class="text-lg font-bold">Status Akhir Pesanan</p>
                            <div class="">
                                <x-button icon="check" disabled positive label="Pesanan Selesai" />
                            </div>

                        {{-- Tombol tidak memiliki aksi apapun --}}
                        @elseif ($order->orderStatus->id == 5)
                            <p class="text-lg font-bold">Status Akhir Pesanan</p>
                            <div class="">
                                <x-button icon="x" disabled label="Pesanan Dibatalkan" />
                            </div>
                        @endif
                    </div>

                </div>
                <div class="block mt-8">
                    <a href="{{ route('penjual.order.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
