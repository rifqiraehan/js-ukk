<div>
    @if (session('error'))
        <div class="w-full text-white bg-red-500">
          <div class="container flex items-center justify-between px-6 py-4 mx-auto">
              <div class="flex">
                  <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                      <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                      </path>
                  </svg>

                  <p class="mx-3">{{ session('error') }}</p>
              </div>

              <button class="p-1 cursor-pointer opacity-75 hover:opacity-100 rounded-md" onclick="this.parentNode.parentNode.style.display='none'">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
             </button>
          </div>
        </div>
      @endif

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
                    <div class="flex justify-between flex-col sm:flex-row">
                        {{-- Ubah status order id menjadi 2 ketika user menekan 'Konfirmasi', dan ubah status order id menjadi 5 ketika user menekan 'Batalkan' --}}
                        @if ($order->orderStatus->id == 1)
                            <p class="text-center sm:text-start text-lg font-bold whitespace-nowrap">Konfirmasi Pesanan?</p>
                            <div class="text-center sm:text-start mt-4 sm:mt-0">
                                <x-button icon="check" positive label="Konfirmasi" wire:click="konfirmasiPesanan" /> <x-button icon="x" negative label="Batalkan" wire:click="batalkanPesanan" />
                            </div>

                        {{-- Ubah status order id menjadi 3 ketika user menekan 'Pesanan Siap' --}}
                        @elseif ($order->orderStatus->id == 2)
                            <p class="text-center sm:text-start text-lg font-bold whitespace-nowrap">Apakah pesanan telah disiapkan?</p>
                            <div class="text-center sm:text-start mt-4 sm:mt-0">
                                <x-button icon="check" positive label="Pesanan Siap" wire:click="pesananSiap"/>
                            </div>

                        {{-- Ubah status order id menjadi 4 ketika user menekan 'Pesanan Selesai' --}}
                        @elseif ($order->orderStatus->id == 3)
                            <p class="text-center sm:text-start text-lg font-bold whitespace-nowrap">Pesanan Selesai?</p>
                            <div class="text-center sm:text-start mt-4 sm:mt-0">
                                <x-button icon="check" positive label="Selesaikan Pesanan" wire:click="pesananSelesai"/>
                            </div>

                        {{-- Tombol tidak memiliki aksi apapun --}}
                        @elseif ($order->orderStatus->id == 4)
                            <p class="text-center sm:text-start text-lg font-bold whitespace-nowrap">Status Akhir Pesanan</p>
                            <div class="text-center sm:text-start mt-4 sm:mt-0">
                                <x-button icon="check" disabled positive label="Pesanan Selesai" />
                            </div>

                        {{-- Tombol tidak memiliki aksi apapun --}}
                        @elseif ($order->orderStatus->id == 5)
                            <p class="text-center sm:text-start text-lg font-bold whitespace-nowrap">Status Akhir Pesanan</p>
                            <div class="text-center sm:text-start mt-4 sm:mt-0">
                                <x-button icon="x" disabled negative label="Pesanan Dibatalkan" />
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
