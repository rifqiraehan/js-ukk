<x-murid-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesanan Saya') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="w-full text-white bg-green-500 rounded-md">
            <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                <div class="flex">
                    <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                        <path
                            d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                        </path>
                    </svg>

                    <p class="mx-3">{{ session('success') }}</p>
                </div>

                <button class="p-1 cursor-pointer opacity-75 hover:opacity-100 rounded-md"
                    onclick="this.parentNode.parentNode.style.display='none'">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                @foreach ($orders as $order)
                    <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                        <div class="grid grid-cols-10">
                            <p class="text-base font-bold mb-3 col-span-9">{{ $order->created_at->format('j M Y') }},
                                {{ $order->created_at->format('H:i') }}
                                <span
                                    class="lg:ml-2 sm:ml-0 px-2 inline-flex text-base font-semibold rounded-full whitespace-nowrap
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
                            </p>

                            <div class="grid justify-items-end">
                                @if ($order->orderStatus->id == 1)
                                    <form action="{{ route('murid.order.destroy', $order->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah anda ingin membatalkan pesanan tersebut?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <hr class="mb-4">
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
                                    class="font-bold ml-2 whitespace-nowrap">Rp
                                    {{ number_format($order->total, 0, '.', '.') }}</span></p>
                            <a href="{{ route('murid.order.show', $order->id) }}">
                                <p class="grid text-sky-700 justify-items-end cursor-pointer">Detail</span></p>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>

</x-murid-layout>
