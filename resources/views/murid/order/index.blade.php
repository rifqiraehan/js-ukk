<x-murid-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 mt-10">
        <div class="mx-auto max-w-5xl justify-center pb-14 px-6 md:flex md:space-x-6 xl:px-0">
            <div class="rounded-lg md:w-2/3">
                <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                    <p class="text-base font-bold mb-3">28 Feb 2023<span
                            class="ml-3 px-2 inline-flex text-base font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu
                            Konfirmasi</span></p>
                    <hr class="my-4">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="justify-between sm:flex sm:justify-start">
                            <img src="{{ asset('images/default/product.jpeg') }}" alt="produk"
                                class="w-full rounded-lg sm:w-40" width="1170" height="80">
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">Nama Produk</h2>
                                    <p class="mt-1 text-xs text-gray-700">Nama Penjual</p>
                                    <p class="text-sm mt-5">Qty x Harga</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4 border">
                    @endfor
                    <div class="grid grid-cols-2">
                        <p class="text-gray-700 whitespace-nowrap">Total Belanja:<span class="font-bold ml-2 whitespace-nowrap">Rp 5.000</span></p>
                        <p class="grid text-sky-700 justify-items-end cursor-pointer">Detail</span></p>
                    </div>
                </div>

                <div class="mb-8 rounded-lg bg-white p-6 shadow-md">
                    <p class="text-base font-bold mb-3">28 Feb 2023<span
                            class="ml-3 px-2 inline-flex text-base font-semibold rounded-full bg-green-100 text-green-800">Pesanan
                            Selesai</span></p>
                    <hr class="my-4">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="justify-between sm:flex sm:justify-start">
                            <img src="{{ asset('images/default/product.jpeg') }}" alt="produk"
                                class="w-full rounded-lg sm:w-40" width="1170" height="80">
                            <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                <div class="mt-5 sm:mt-0">
                                    <h2 class="text-lg font-bold text-gray-900">Nama Produk</h2>
                                    <p class="mt-1 text-xs text-gray-700">Nama Penjual</p>
                                    <p class="text-sm mt-5">Qty x Harga</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4 border">
                    @endfor
                    <div class="grid grid-cols-2">
                        <p class="text-gray-700 whitespace-nowrap">Total Belanja:<span class="font-bold ml-2 whitespace-nowrap">Rp 5.000</span></p>
                        <p class="grid text-sky-700 justify-items-end">
                            <a href="#">Detail</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-murid-layout>
