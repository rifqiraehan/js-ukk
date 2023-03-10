<x-murid-layout pagetitle="Detail Produk">
  <section class="text-gray-700 body-font overflow-hidden bg-gray-100">
    <div class="container px-5 pb-16 pt-12 mx-auto">
      @if (session('error'))
        <div class="w-full text-white bg-red-500 rounded-md">
          <div class="container flex items-center justify-between px-6 py-4 mx-auto">
              <div class="flex">
                  <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                      <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                      </path>
                  </svg>

                  <p class="mx-3">{{ session('error') }}</p>
              </div>

              <button class="p-1 cursor-pointer opacity-75 hover:opacity-100 rounded-md" onclick="this.parentNode.parentNode.style.display='none'">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
             </button>
          </div>
        </div>
      @endif

      @if (session('success'))
        <div class="w-full text-white bg-green-500 rounded-md">
          <div class="container flex items-center justify-between px-6 py-4 mx-auto">
              <div class="flex">
                  <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                      <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                      </path>
                  </svg>

                  <p class="mx-3">{{ session('success') }}</p>
              </div>

              <button class="p-1 cursor-pointer opacity-75 hover:opacity-100 rounded-md" onclick="this.parentNode.parentNode.style.display='none'">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
             </button>
          </div>
        </div>
      @endif

      <div class="lg:w-4/5 mx-auto flex flex-wrap mt-4">
        <img alt="produk" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{ asset($product->foto) }}">
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">Nama Produk</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-3">{{ $product->name }}</h1>
          <h2 class="text-sm title-font text-gray-500 tracking-widest">Penjual</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium">{{ $users->firstWhere('id', $product->user_id)->name }}</h1>
          <h1 class="text-gray-500 text-lg title-font font-medium mb-3">{{ $users->firstWhere('id', $product->user_id)->lokasi }}</h1>
          <h2 class="text-sm title-font text-gray-500 tracking-widest">Detail</h2>
          <p class="leading-relaxed">{{ $product->detail }}</p>
          <div class="flex mt-6 items-center pb-5 pt-5 border-b-2 border-t-2 border-gray-200 mb-5">
            <div class="flex">
              <p>
                {{
                  $product->updated_at != $product->created_at
                  ? 'Stok diperbarui ' . $product->updated_at->diffForHumans()
                  : 'Produk ditambahkan ' . $product->created_at->diffForHumans()
                }}.
              </p>
            </div>
          </div>
          <div class="flex">
            <span class="title-font font-medium text-2xl text-gray-900">Rp {{ number_format($product->harga ?? 0, 0, '.', '.'); }}
            </span>
            <form action="{{ route('murid.cart.store') }}" method="POST" class="mx-4">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <button type="submit" class="flex items-center ml-auto space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <span>Keranjang</span>
              </button>
            </form>
            <h2 class="text-sm title-font text-gray-500 tracking-widest inline-flex items-center justify-center">Stok: {{ $product->stok }}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-murid-layout>
