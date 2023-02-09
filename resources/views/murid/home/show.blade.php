<x-murid-layout>
    <section class="text-gray-700 body-font overflow-hidden bg-gray-50">
        <div class="container px-5 py-16 mx-auto">
          <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ asset($product->foto) }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
              <h2 class="text-sm title-font text-gray-500 tracking-widest">Nama Produk</h2>
              <h1 class="text-gray-900 text-3xl title-font font-medium mb-3">{{ $product->name }}</h1>
              <h2 class="text-sm title-font text-gray-500 tracking-widest">Penjual</h2>
              <h1 class="text-gray-900 text-3xl title-font font-medium">{{ $users->firstWhere('id', $product->user_id)->name }}</h1>
              <h1 class="text-gray-500 text-lg title-font font-medium mb-3">Kantin {{ $users->firstWhere('id', $product->user_id)->lokasi }}</h1>
              <h2 class="text-sm title-font text-gray-500 tracking-widest">Detail</h2>
              <p class="leading-relaxed">{{ $product->detail }}</p>
              <div class="flex mt-6 items-center pb-5 pt-5 border-b-2 border-t-2 border-gray-200 mb-5">
                <div class="flex">
                  {{
                    $product->updated_at != $product->created_at
                    ? 'Stok diperbarui ' . $product->updated_at->diffForHumans()
                    : 'Produk ditambahkan ' . $product->created_at->diffForHumans()
                  }}

                </div>
              </div>
              <div class="flex">
                <span class="title-font font-medium text-2xl text-gray-900">Rp {{ number_format($product->harga ?? 0, 0, '.', '.'); }}
                </span>
                <div class="flex items-center ml-auto space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                  </svg>

                  <a href="#">Keranjang</a>
                </div>
                <h2 class="text-sm title-font text-gray-500 tracking-widest inline-flex items-center justify-center ml-4">Stok: {{ $product->stok }}</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-murid-layout>
