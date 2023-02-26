<x-penjual-layout pagetitle="Daftar Produk">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <!-- Product List -->
    <section class="py-10 bg-gray-100">
        <div class="ml-[4rem] px-6">
            <a href="{{ route('penjual.product.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Produk</a>
        </div>

        <div class="mb-4 flex justify-between items-center">
            <div class="flex-1 pr-4"></div>
            <div>
                <!-- Searching -->
                <form action="{{ route('penjual.product.index') }}" method="GET">
                    <div class="relative text-gray-700 focus-within:text-gray-600 mr-20">
                        <div class="relative md:w-1/3">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </span>
                            <input name="term" type="search"
                                class="py-2 text-sm text-gray
            bg-gray-100 rounded-md pl-10 focus:outline-none
            focus:bg-gray-200 focus:text-gray-700"
                                placeholder="{{ __('Search...') }}" autocomplete="off">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @if ($products->count() == 0)
                <div class="col-span-4">
                    <div class="flex flex-col items-center justify-center">
                        <h2 class="text-xl text-gray-500">Produk yang dicari tidak ditemukan.</h2>
                    </div>
                </div>
            @else
                @foreach ($products as $product)
                    <article
                        class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                        <a href="{{ route('penjual.product.show', $product->id) }}">
                            <div class="relative flex items-end overflow-hidden rounded-xl">
                                <img src="{{ asset($product->foto) }}" alt="{{ $product->name }}" width="800"
                                    height="450">
                            </div>
                            <div class="mt-1 p-2">
                                <h2 class="text-slate-700">{{ $product->name }}</h2>
                                <p class="mt-1 text-sm font-bold text-slate-400">Stok:
                                    @if ($product->stok <= 0)
                                        <span class="text-red-500">KOSONG</span>
                                    @else
                                        {{ $product->stok }}
                                    @endif
                                </p>

                                <div class="grid grid-cols-2 mt-3 flex items-center justify-between">
                                    <p>
                                        <span class="text-lg font-bold text-blue-500">Rp
                                            {{ number_format($product->harga ?? 0, 0, '.', '.') }}</span>
                                    </p>

                                    <div class="flex ml-auto gap-1">
                                        <form action="{{ route('penjual.product.destroy', $product->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah anda yakin menghapus produk tersebut?');">
                                            @method('delete')
                                            @csrf
                                            <div
                                                class="flex items-center rounded-lg bg-red-500 p-1.5 text-white duration-100 hover:bg-red-600">
                                                <button class="text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>

                                        <div
                                            class="flex items-center rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                                            <a href="{{ route('penjual.product.edit', $product->id) }}"><button
                                                    class="text-sm">Edit</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            @endif
        </div>
        <div class="border-b mx-12 border-gray-300"></div>
        <div class="py-4 mx-12">
            {{ $products->links() }}
        </div>
    </section>
</x-penjual-layout>
