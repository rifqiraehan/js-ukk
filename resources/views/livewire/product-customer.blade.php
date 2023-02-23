<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
            @if (request()->has('penjual'))
                <span class="text-xl text-gray-500">{{ $users->firstWhere('id', request()->penjual)->name }}</span>
            @endif
        </h2>
    </x-slot>

    <!-- Product List -->
    <section class="py-10 bg-gray-100">
        <div class="mb-4 flex justify-between items-center">
            <div class="flex-1 pr-4"></div>
            <div>
                <!-- Searching -->
                <div class="relative text-gray-700 focus-within:text-gray-600 mr-20">
                    <div class="relative md:w-1/3">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input wire:model="search" type="search"
                            class="py-2 text-sm text-gray
                    bg-gray-100 rounded-md pl-10 focus:outline-none
                    focus:bg-gray-200 focus:text-gray-700"
                            placeholder="{{ __('Search...') }}" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($products as $product)
                <article
                    class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{ route('murid.product.show', $product->id) }}">
                        <div class="relative flex items-end overflow-hidden rounded-xl">
                            <img src="{{ asset($product->foto) }}" alt="{{ $product->name }}" width="800"
                                height="450">
                        </div>
                        <div class="mt-1 p-2">
                            <h2 class="text-slate-700">{{ $product->name }}</h2>

                            <a class="text-sm text-slate-500 hover:text-slate-700"
                                href="{{ route('murid.product.index', ['penjual' => $users->firstWhere('id', $product->user_id)->id]) }}">{{ $users->firstWhere('id', $product->user_id)->name }}</a>

                            <p class="mt-2 text-sm text-slate-400">Stok: {{ $product->stok }}</p>

                            <div class="mt-3 flex items-end justify-between">
                                <p>
                                    <span class="text-lg font-bold text-blue-500">Rp
                                        {{ number_format($product->harga ?? 0, 0, '.', '.') }}</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
        <div class="border-b mx-12 border-gray-300"></div>
        <div class="py-4 mx-12">
            {{ $products->links() }}
        </div>
    </section>
</div>
