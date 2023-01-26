<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Produk
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('penjual.product.store') }}">
                    @csrf
                    <div class="grid grid-cols-2 shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="detail" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <input type="text" name="detail" id="detail" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('detail', '') }}" />
                            @error('detail')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="harga" class="block font-medium text-sm text-gray-700">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('harga', '') }}" placeholder="Rp" />
                            @error('harga')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="stok" class="block font-medium text-sm text-gray-700">Stok</label>
                            <input type="number" min="1" max="50" name="stok" id="stok" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('stok', '') }}" />
                            @error('stok')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="foto" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <input type="text" name="foto" id="foto" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('foto', '') }}" />
                            @error('foto')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Buat
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>