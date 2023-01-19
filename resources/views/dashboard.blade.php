<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}  {{ Auth::user()->role->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-xl">
            <h1>Welcome,<strong> {{ Auth::user()->username }}</strong></h1>
            <h1>Jumlah pengguna terdaftar pada <em>Canteen Co.</em> adalah {{ Auth::user()->count() }}</h1>
        </div>
    </div>
</x-app-layout>
