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
                    <p class="text-base">Tanggal Pesan : 28 Feb 2023
                    <p class="text-base">Status Produk :<span
                            class="ml-2 px-2 inline-flex text-base font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu
                            Konfirmasi</span>
                        <hr class="my-4 border">

                    <p class="font-bold text-lg mb-2">Detail Penjual</p>
                    <p class="text-base">Nama Penjual : Bu jane
                    <p class="text-base">Lokasi Kantin :<span
                            class="ml-2 px-2 inline-flex text-base font-semibold rounded-full bg-purple-100 text-purple-800">Lokasi
                            A</span>
                        <hr class="my-4 border">

                    <p class="font-bold text-lg mb-2">Detail Pembeli</p>
                    <p class="text-base">Nama Pembeli : John Doe (johndoe@gmail.com)
                    <p class="text-base">Kelas :<span
                            class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            XII RPL 2
                        </span>
                        <hr class="my-4 border">

                    <p class="font-bold text-lg mb-2">Detail Pesanan</p>
                    <div class="grid grid-cols-2">
                        <p class="text-gray-700">Nasi Bungkus (x2)</p>
                        <p class="text-gray-700 grid justify-items-end">Rp 4.000</p>
                        <p class="text-gray-700">Es Teh Hangat (x2)</p>
                        <p class="text-gray-700 grid justify-items-end">Rp 6.000</p>
                        <p class="text-gray-700">Nasi Kecap (x2)</p>
                        <p class="text-gray-700 grid justify-items-end">Rp 8.000</p>
                    </div>

                    <hr class="my-4 border">

                    <div class="mt-4 mb-2 flex justify-between">
                        <p class="text-gray-700">Total Harga (3 Barang)</p>
                        <p class="text-gray-700 ml-4">
                            Rp
                            18.000
                        </p>
                    </div>
                    <hr class="my-4 border">
                    <div class="flex justify-between">
                        <p class="text-lg font-bold">Total Tagihan</p>
                        <div class="">
                            <p class="mb-1 text-lg font-bold">
                                Rp
                                18.000
                            </p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="block mt-8">
                    <a href="{{ route('murid.order.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-murid-layout>
