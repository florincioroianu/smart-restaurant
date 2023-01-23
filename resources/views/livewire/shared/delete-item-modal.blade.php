<x-jet-confirmation-modal>
    <x-slot name="title">
        {{ __("Sterge") }}
    </x-slot>

    <x-slot name="content">
        {{ __("Esti sigur ca doresti sa stergi?") }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="closeDeleteModal()" wire:loading.attr="disabled">
            {{ __('Anuleaza') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete()" wire:loading.attr="disabled">
            {{ __('Sterge') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
