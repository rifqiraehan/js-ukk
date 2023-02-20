<x-murid-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout Produk') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">

            <p class="text-xl font-bold mb-3">Anda membuat {{ $groupedCarts->count() }} pesanan sebagai berikut:</p>
            @foreach ($groupedCarts as $sellerId => $carts)
            <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                <p class="text-lg font-bold mb-3">Kantin {{ $carts->first()->product->user->name }}
                    <span class="ml-0.5 px-2 inline-flex text-sm leading-5 font-semibold rounded-full whitespace-nowrap {{ $carts->first()->product->user->lokasi == 'Lokasi A' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">{{ $carts->first()->product->user->lokasi }}</span></p>
                    <hr class="my-4 border">
                    @foreach ($carts as $cart)
                        <div class="justify-between sm:flex sm:justify-start">
                            <img src="{{ asset($cart->product->foto) }}" alt="produk" class="w-full rounded-lg sm:w-40"
                                width="1170" height="80">
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">{{ $cart->product->name }}</h2>
                                    <p class="mt-1 text-xs text-gray-700">{{ $cart->product->user->name }}.</p>
                                    <p class="text-sm mt-5">{{ $cart->quantity }} x Rp
                                        {{ number_format($cart->product->harga, 0, '.', '.') }}</p>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between sm:space-y-2 sm:mt-0 sm:block sm:space-x-8">
                                <p class="text-gray-700 whitespace-nowrap grid justify-items-end">Total Belanja:</p>
                                <p class="font-bold whitespace-nowrap grid justify-items-end">Rp
                                    {{ number_format($cart->product->harga * $cart->quantity, 0, '.', '.') }}</p>
                            </div>
                        </div>

                        <hr class="my-4 border">


                        @endforeach
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">Total Tagihan</p>
                            <div class="">
                                <p class="mb-1 text-lg font-bold">
                                    Rp {{ number_format($carts->sum(function ($cart) {
                                        return $cart->product->harga * $cart->quantity;
                                    }), 0, '.', '.') }}
                                </p>
                                </p>
                            </div>
                        </div>
                </div>
            @endforeach

                <livewire:payment-detail />
            </div>
        </div>
    </div>

</x-murid-layout>
