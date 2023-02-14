<div class="flex items-center lg:ml-20 space-x-3">
    <x-button wire:loading.attr="disabled" wire:click="decrement" icon="minus" />

    <span class="bg-blue-500 text-white px-5 py-1.5 rounded-md" wire:model="quantity">
        {{ $quantity }}
    </span>

    <x-button wire:loading.attr="disabled" wire:click="increment" icon="plus" />
</div>

