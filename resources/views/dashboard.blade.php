<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::user()->role->name }}
        </h2>
    </x-slot>

    <div class="m-8">
        <div class="flex flex-col">
            <p class="font-bold text-xl">Selamat Datang, <span class=" text-gray-500">{{ Auth::user()->name }}</span></p>
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mb-8">
                @if (Auth::user()->role_id == 2)
                    <a href="{{ route('penjual.laporan.index') }}">
                        <div
                            class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full border border-green-100 bg-green-50">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-green-400 icon icon-tabler icon-tabler-wallet" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12">
                                    </path>
                                    <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h2 class="font-semibold">Total Penghasilan</h2>
                                <p class="mt-2 text-sm text-gray-500">Rp
                                    {{ number_format($totalPenghasilan, 0, '.', '.') }}
                                </p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('penjual.product.index') }}">
                        <div
                            class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-blue-400 icon icon-tabler icon-tabler-soup" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z">
                                    </path>
                                    <path d="M12 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                    <path d="M16 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                    <path d="M8 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                </svg>
                            </div>

                            <div class="ml-4">
                                <h2 class="font-semibold"> {{ Auth::user()->product->count() }} Produk dijual</h2>
                                @if (Auth::user()->product->count() == 0)
                                    <p class="mt-2 text-sm text-gray-500">Belum ada produk yang dijual</p>
                                @else
                                    <p class="mt-2 text-sm text-gray-500">Terakhir ditambahkan
                                        {{ Auth::user()->product->sortByDesc('created_at')->first()->created_at->diffForHumans() }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('penjual.order.index') }}">
                        <div
                            class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-orange-400 icon icon-tabler icon-tabler-shopping-cart"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                            </div>

                            <div class="ml-4">
                                @if ($pesananBelumKonfirmasi == 0)
                                    <h2 class="font-semibold">Semua pesanan dikonfirmasi</h2>
                                    <p class="mt-2 text-sm text-gray-500">Belum ada pesanan masuk</p>
                                @elseif ($pesananBelumKonfirmasi > 0)
                                    <h2 class="font-semibold">{{ $pesananBelumKonfirmasi }} Pesanan belum dikonfirmasi
                                    </h2>
                                    <p class="mt-2 text-sm text-gray-500">Pesanan masuk {{ $waktuPesananBaru }}</p>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </a>
                @elseif (Auth::user()->role_id == 1)
                    <a href="{{ route('admin.users.index') }}">
                        <div
                            class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-100 bg-orange-50">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-orange-400 icon icon-tabler icon-tabler-users" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </div>

                            <div class="ml-4">
                                <h2 class="font-semibold">{{ $totalUser }} Pengguna terdaftar</h2>
                                <p class="mt-2 text-sm text-gray-500">Terakhir terdaftar {{ $waktuPenggunaBaru }}</p>
                            </div>
                        </div>
                    </a>

                    <div
                        class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-blue-100 bg-blue-50">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-blue-400 icon icon-tabler icon-tabler-soup" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z">
                                </path>
                                <path d="M12 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                <path d="M16 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                                <path d="M8 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                            </svg>
                        </div>

                        <div class="ml-4">
                            <h2 class="font-semibold">{{ $totalProduct }} Produk terdaftar</h2>
                            <p class="mt-2 text-sm text-gray-500">Terakhir ditambahkan {{ $waktuProductBaru }}</p>
                        </div>
                    </div>
                    <div
                        class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-green-100 bg-green-50">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-green-400 icon icon-tabler icon-tabler-wallet" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12">
                                </path>
                                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"></path>
                            </svg>
                        </div>

                        <div class="ml-4">
                            <h2 class="font-semibold">Rp
                                {{ number_format($totalPenghasilanSeluruhPenjual, 0, '.', '.') }} Total penjualan</h2>
                            <p class="mt-2 text-sm text-gray-500">Terakhir pesanan selesai
                                {{ $terakhirPemesananSelesai }}</p>
                        </div>
                    </div>
                    <div
                        class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-purple-100 bg-purple-100">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-purple-400 icon icon-tabler icon-tabler-school" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                            </svg>
                        </div>

                        <div class="ml-4">
                            <h2 class="font-semibold">{{ $totalMurid }} Murid terdaftar</h2>
                            <p class="mt-2 text-sm text-gray-500">Terakhir terdaftar {{ $terakhirMuridTerdaftar }}</p>
                        </div>
                    </div>
                    <div
                        class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-fuchsia-100 bg-fuchsia-100">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-fuchsia-400 icon icon-tabler icon-tabler-chef-hat" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 3c1.918 0 3.52 1.35 3.91 3.151a4 4 0 0 1 2.09 7.723l0 7.126h-12v-7.126a4 4 0 1 1 2.092 -7.723a4 4 0 0 1 3.908 -3.151z">
                                </path>
                                <path d="M6.161 17.009l11.839 -.009"></path>
                            </svg>
                        </div>

                        <div class="ml-4">
                            <h2 class="font-semibold">{{ $totalPenjual }} Penjual Terdaftar</h2>
                            <p class="mt-2 text-sm text-gray-500">Terakhir terdaftar {{ $terakhirPenjualTerdaftar }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-rose-100 bg-rose-50">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="text-rose-400 icon icon-tabler icon-tabler-cup" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 11h14v-3h-14z"></path>
                                <path d="M17.5 11l-1.5 10h-8l-1.5 -10"></path>
                                <path d="M6 8v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1"></path>
                                <path d="M15 5v-2"></path>
                            </svg>
                        </div>

                        <div class="ml-4">
                            <h2 class="font-semibold">Rp {{ number_format($rataRataHargaProduk, 0, '.', '.') }}
                                Rata-rata harga produk</h2>
                            <p class="mt-2 text-sm text-gray-500">Berdasarkan {{ $totalProduct }} produk terdaftar</p>
                        </div>
                    </div>

                    <a href="{{ route('admin.categories.index') }}">
                        <div
                            class="flex items-start rounded-xl bg-white p-4 shadow-lg hover:transform hover:scale-105 duration-300">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full border border-slate-100 bg-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="text-slate-400 icon icon-tabler icon-tabler-category" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h6v6h-6z"></path>
                                    <path d="M14 4h6v6h-6z"></path>
                                    <path d="M4 14h6v6h-6z"></path>
                                    <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                </svg>
                            </div>

                            <div class="ml-4">
                                <h2 class="font-semibold">{{ $totalKategori }} Kategori terdaftar</h2>
                                <p class="mt-2 text-sm text-gray-500">Terakhir ditambahkan
                                    {{ $terakhirKategoriTerdaftar }}</p>
                            </div>
                        </div>
                    </a>


                @endif


            </div>
        </div>
</x-app-layout>
