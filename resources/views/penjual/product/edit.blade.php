<x-penjual-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('penjual.product.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Kembali</a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" enctype="multipart/form-data" action="{{ route('penjual.product.update', $product->id) }}">
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-2 shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama Produk</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $product->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="detail" class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <input type="text" name="detail" id="detail" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('detail', $product->detail) }}" />
                            @error('detail')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="harga" class="block font-medium text-sm text-gray-700">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('harga', $product->harga) }}" />
                            @error('harga')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="stok" class="block font-medium text-sm text-gray-700">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('stok', $product->stok) }}" />
                            @error('stok')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="foto" class="block font-medium text-sm text-gray-700">Foto</label>
                            @if ($product->foto)
                                <img src="{{ asset($product->foto) }}" alt="{{ $product->name }}">
                            @else
                                <img class="img-preview img-fluid mb-3">
                            @endif
                            <input type="file" name="foto" id="foto" class="form-input rounded-md shadow-sm mt-1 block w-full" onchange="previewImage()" >

                            @error('foto')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <div class="px-4 py-5 bg-white sm:p-6">
                        </div>

                        <div class="px-4 py-5 bg-gray-50 sm:p-6">
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-block items-center px-4 py-2 mr-3 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red disabled:opacity-25 transition ease-in-out duration-150" action="{{ route('penjual.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" value="HAPUS">
                            </button>

                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-penjual-layout>

<script>
    function previewImage() {
    const image = document.querySelector('#foto');
    const imagePreview = document.querySelector('.img-preview');

    imagePreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imagePreview.src = oFREvent.target.result;
    };
}
</script>