<div>
    <p class="text-lg font-bold mb-3">Detail Pembayaran</p>
    <div class="mb-6 rounded-lg bg-white p-6 shadow-md">
        <div class="mb-2 flex justify-between">
            <p class="text-gray-700 text-xs">
                <span
                    class="mr-3 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{ Auth::user()->kelas }} {{ Auth::user()->jurusan }}
                </span>{{ Auth::user()->name }} ({{ Auth::user()->email }})
            </p>
        </div>
        <hr class="my-4">
        <div class="mt-4 mb-2 flex justify-between">
            <p class="text-gray-700">Total Harga ({{ $totalProduct }} Barang)</p>
            <p class="text-gray-700 ml-4">
                Rp
                {{ number_format($subTotal, 0, '.', '.') }}
            </p>
        </div>
        <hr class="my-4" />
        <div class="flex justify-between">
            <p class="text-lg font-bold">Total Seluruh Tagihan</p>
            <div class="">
                <p class="mb-1 text-lg font-bold">
                    Rp
                    {{ number_format($total, 0, '.', '.') }}
                </p>
                </p>
            </div>
        </div>
        <form action="{{ route('murid.cart.checkout.store') }}" method="POST">
            @csrf
            <button type="submit"
                class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Buat
                Pesanan</button>
        </form>
    </div>
</div>
