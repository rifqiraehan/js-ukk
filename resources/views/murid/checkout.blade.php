<x-murid-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pesanan') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                <p class="text-lg font-bold mb-3">Detail Produk</p>
                @foreach ($carts as $cart)
                    <div class="justify-between mb-8 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img src="{{ asset($cart->product->foto) }}" alt="produk" class="w-full rounded-lg sm:w-40"
                            width="1170" height="80">
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900">{{ $cart->product->name }}</h2>
                                <p class="mt-1 text-xs text-gray-700">{{ $cart->product->user->name }}.</p>
                                <p class="text-sm mt-5">{{ $cart->quantity }} x Rp {{ number_format($cart->product->harga, 0, '.', '.') }}</p>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-between sm:space-y-2 sm:mt-0 sm:block sm:space-x-8 mr-4">
                            <p class="text-gray-700 whitespace-nowrap">Total Belanja:</p>
                            <p class="font-bold whitespace-nowrap">Rp {{ number_format($cart->product->harga * $cart->quantity, 0, '.', '.') }}</p>
                        </div>
                    </div>
                @endforeach


                <livewire:payment-detail/>
            </div>
        </div>
    </div>

</x-murid-layout>
