<x-admin-layout pagetitle="Daftar User">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar User') }}
        </h2>
    </x-slot>

    <div>
        <livewire:list-users />
    </div>
</x-admin-layout>
