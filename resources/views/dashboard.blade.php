<x-penjual-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}  {{ Auth::user()->role->name }}
      </h2>
  </x-slot>

  <div class="m-8">
      <div class="flex flex-col">
          <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @if (Auth::user()->role_id == 2)
              <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                  </svg>
                </div>
                <div class="ml-4">
                  <h2 class="font-semibold">Total Penghasilan</h2>
                    <p class="mt-2 text-sm text-gray-500">Rp {{ number_format($totalPenghasilan, 0, '.', '.') }}</p>
                </div>
              </div>

              <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                  </svg>
                </div>

                <div class="ml-4">
                  <h2 class="font-semibold"> {{ Auth::user()->product->count() }} Produk dijual</h2>
                  @if (Auth::user()->product->count() == 0)
                    <p class="mt-2 text-sm text-gray-500">Belum ada produk yang dijual</p>
                  @else
                  <p class="mt-2 text-sm text-gray-500">Terakhir ditambahkan {{ Auth::user()->product->sortByDesc('created_at')->first()->created_at->diffForHumans() }}</p>
                  @endif
                </div>
              </div>
            @endif

            <div class="flex items-start rounded-xl bg-white p-4 shadow-lg">
              <div class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </div>

              <div class="ml-4">
                <h2 class="font-semibold">Your User ID: {{ Auth::id() }}</h2>
                <p class="mt-2 text-sm text-gray-500">Last checked 3 days ago</p>
              </div>
            </div>

        </div>
  </div>
</x-penjual-layout>
