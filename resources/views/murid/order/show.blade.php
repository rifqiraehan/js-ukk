<x-murid-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                    <p class="font-bold text-lg mb-2">Detail Pesanan</p>
                    <p class="text-base">Tanggal Pesan : {{ $order->created_at->format('j M Y') }}
                    <p class="text-base">Status Produk :<span
                            class="ml-2 px-2 inline-flex text-base font-semibold rounded-full
                        @if ($order->orderStatus->id == 1) bg-gray-100 text-gray-800
                        @elseif ($order->orderStatus->id == 2)
                        bg-yellow-100 text-yellow-800
                        @elseif ($order->orderStatus->id == 3)
                        bg-green-100 text-green-800
                        @else
                        bg-purple-100 text-purple-800 @endif
                    ">
                            {{ $order->orderStatus->status }}
                        </span>
                        <hr class="my-4 border">
                    <p class="font-bold text-lg mb-2">Detail Pembeli</p>
                    <p class="text-base">Nama Pembeli : {{ Auth::user()->name }} ({{ Auth::user()->email }})
                    <p class="text-base">Kelas :<span
                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            XII RPL 2
                        </span>
                        <hr class="my-4 border">

                    <p class="font-bold text-lg mb-2">Detail Pesanan</p>
                    <div>
                        @foreach ($order->orderItems as $item)
                            <p class="whitespace-nowrap text-gray-600">
                                {{ $item->product->user->name }}
                                <span
                                    class="ml-0.5 px-2 inline-flex text-xs leading-5 font-semibold rounded-full whitespace-nowrap
                                @if ($item->product->user->lokasi == 'Lokasi A') bg-green-100 text-green-800
                                @elseif($item->product->user->lokasi == 'Lokasi B') bg-purple-100 text-purple-800 @endif">
                                    {{ $item->product->user->lokasi }}
                                </span>
                            </p>

                            <div class="grid grid-cols-2 w-full">
                                <p>{{ $item->product->name }} (x{{ $item->quantity }})</p>
                                <p class="grid justify-end">Rp {{ number_format($item->sub_total, 0, '.', '.') }}</p>
                            </div>

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
                </div>
                <div class="block mt-8">
                    <a href="{{ route('murid.order.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-murid-layout>
