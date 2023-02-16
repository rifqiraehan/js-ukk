<x-murid-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @foreach ($orders as $order)
                    <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                        <p class="text-base font-bold mb-3">{{ $order->created_at->format('j M Y') }}, {{ $order->created_at->format('H:i') }}
                            <span class="ml-2 px-2 inline-flex text-base font-semibold rounded-full
                                @if ($order->orderStatus->id == 1)
                                bg-gray-100 text-gray-800
                                @elseif ($order->orderStatus->id == 2)
                                bg-yellow-100 text-yellow-800
                                @elseif ($order->orderStatus->id == 3)
                                bg-green-100 text-green-800
                                @else
                                bg-purple-100 text-purple-800
                                @endif
                            ">
                            {{ $order->orderStatus->status }}
                            </span>
                        </p>
                        <hr class="my-4">
                        @foreach ($order->orderItems as $item)
                            <div class="justify-between sm:flex sm:justify-start">
                                <img src="{{ asset($item->product->foto) }}" alt="produk"
                                    class="w-full rounded-lg sm:w-40" width="1170" height="80">
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-5 sm:mt-0">
                                        <h2 class="text-lg font-bold text-gray-900">{{ $item->product->name }}</h2>
                                        <p class="mt-1 text-xs text-gray-700">{{ $item->product->user->name }}</p>
                                        <p class="text-sm mt-5">{{ $item->quantity }} x Rp
                                            {{ number_format($item->product->harga, 0, '.', '.') }}</p>
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between sm:space-y-2 sm:mt-0 sm:block sm:space-x-8 mr-4">
                                    <p class="text-gray-700 whitespace-nowrap grid justify-items-end">Subtotal:</p>
                                    <p class="font-bold whitespace-nowrap grid justify-items-end">Rp
                                        {{ number_format($item->sub_total, 0, '.', '.') }}</p>
                                </div>
                            </div>
                            <hr class="my-4 border">
                        @endforeach
                        <div class="grid grid-cols-2">
                            <p class="text-gray-700 whitespace-nowrap">Total Belanja:<span
                                    class="font-bold ml-2 whitespace-nowrap">Rp {{ number_format($order->total, 0, '.', '.') }}</span></p>
                            <a href="{{ route('murid.order.show', $order->id) }}">
                                <p class="grid text-sky-700 justify-items-end cursor-pointer">Detail</span></p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-murid-layout>
