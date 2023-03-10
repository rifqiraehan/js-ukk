@if ($isEmpty)
    <div class="flex flex-col items-center justify-center w-full h-full mt-16">
        <h1 class="text-2xl font-bold text-gray-700">Keranjang Belanja Kosong</h1>
        <a href="{{ route('murid.product.index') }}"
            class="px-6 py-2 mt-4 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Belanja
            Sekarang</a>
    </div>
@else
<div class="bg-gray-100 mt-10">
    <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
        <div class="rounded-lg md:w-2/3">
            @foreach ($carts as $cart)
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <img src="{{ asset($cart->product->foto) }}" alt="produk" class="w-full rounded-lg sm:w-40"
                        width="1170" height="80">
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900">{{ $cart->product->name }}</h2>
                            <p class="mt-1 text-xs text-gray-700">{{ $cart->product->user->name }}</p>
                            <p class="mt-1 text-xs text-gray-700">Stok: {{ $cart->product->stok }}</p>
                            <p class="text-sm mt-5">Rp {{ number_format($cart->product->harga, 0, '.', '.') }}</p>
                        </div>
                        <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                            <div class="flex items-center lg:ml-20 space-x-3">
                                <div class="flex items-center gap-2">

                                    <x-button wire:loading.attr="disabled"
                                        wire:click="decrementQty({{ $cart->id }})" icon="minus" />

                                    <span class="bg-blue-500 text-white px-5 py-1.5 rounded-md" wire:model="quantity"
                                        wire:change="updateQty({{ $cart->id }}, $event.target.value)">
                                        {{ $cart->quantity }}
                                    </span>

                                        <x-button wire:loading.attr="disabled"
                                        wire:click="incrementQty({{ $cart->id }})" icon="plus" />

                                </div>

                            </div>

                            <div class="flex items-center space-x-4 lg:pl-52">
                                <button class="flex items-center px-2 py-1 pl-0 space-x-1" wire:loading.attr="disabled" wire:click="deleteCart({{ $cart->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="0.75" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Sub total -->
        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
            <div class="mb-2 flex justify-between">
                <p class="text-gray-700">Subtotal</p>
                <p class="text-gray-700">
                    Rp {{ number_format($carts->sum(function ($cart) {return $cart->product->harga * $cart->quantity;}), 0, '.', '.') }}</p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
                <p class="text-lg font-bold">Total Tagihan</p>
                <div class="">
                    <p class="mb-1 text-lg font-bold">
                        Rp {{ number_format($carts->sum(function ($cart) {return $cart->product->harga * $cart->quantity;}), 0, '.', '.') }}</p>
                </div>
            </div>
            <form action="{{ route('murid.cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check
                    out</button>
            </form>
        </div>
    </div>
</div>
@endif