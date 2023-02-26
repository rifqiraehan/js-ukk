<x-penjual-layout pagetitle="Detail Pesanan">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pesanan
        </h2>
    </x-slot>

    <livewire:pesanan-detail :order="$order"/>
</x-penjual-layout>
