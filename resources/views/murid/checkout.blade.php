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
                                <p class="text-sm mt-5"> {{ $cart->quantity }} x Rp {{ number_format($cart->product->harga, 0, '.', '.') }}</p>
                            </div>
                        </div>

                        <div class="mt-4 flex justify-between sm:space-y-2 sm:mt-0 sm:block sm:space-x-8 mr-4">
                            <p class="text-gray-700 whitespace-nowrap">Total Belanja:</p>
                            <p class="font-bold whitespace-nowrap">Rp {{ number_format($cart->product->harga * $cart->quantity, 0, '.', '.') }}</p>
                        </div>
                    </div>
                @endforeach


                <p class="text-lg font-bold mb-3">Metode Pengiriman</p>
                <div class="mb-6 rounded-lg bg-white p-6 shadow-md">
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700 text-xs">
                            <span
                                class="mr-3 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                               {{ Auth::user()->kelas }} {{ Auth::user()->jurusan }}
                            </span>{{ Auth::user()->name }} ({{ Auth::user()->email }})
                        </p>
                    </div>
                    <hr class="my-4">
                    <label for="countries" class="block mb-2 font-medium text-gray-900 dark:text-gray-400">Pilih
                        Pengiriman: </label>
                    <select id="shipping_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0">Ambil Sendiri</option>
                        <option value="1">Diantar Kurir</option>
                    </select>

                    <div class="mt-4 mb-2 flex justify-between">
                        <p class="text-gray-700">Total Harga (2 Produk)</p>
                        <p class="text-gray-700 ml-4">
                            Rp {{ number_format($carts->sum(function ($cart) {return $cart->product->harga * $cart->quantity;}), 0, '.', '.') }}
                        </p>
                    </div>
                    <div class="mb-2 flex justify-between">
                        <p class="text-gray-700">Total Ongkos Kirim</p>
                        <p class="text-gray-700">
                            Rp 3.000
                        </p>
                    </div>
                    <hr class="my-4" />
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total Tagihan</p>
                        <div class="">
                            <p class="mb-1 text-lg font-bold">
                                Rp {{ number_format($carts->sum(function ($cart) {return $cart->product->harga * $cart->quantity;}), 0, '.', '.') }}</p>
                            </p>
                        </div>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Buat
                            Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-murid-layout>
