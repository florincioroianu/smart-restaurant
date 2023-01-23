<x-jet-button wire:click="edit({{ $model->id }})">{{ __('Editeaza') }}</x-jet-button>
<x-jet-danger-button wire:click="confirmDelete({{ $model->id }})">{{ __('Sterge') }}
</x-jet-danger-button>
