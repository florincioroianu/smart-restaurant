<!-- Add New Product Modal -->
<x-jet-dialog-modal>
    <x-slot name="title">
        {{ __('Adauga/Editeaza inventar') }}
    </x-slot>

    <x-slot name="content">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Tip:</label>
                        <select wire:model.defer="type"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="type">
                            <option value="">Selecteaza tipul</option>
                            <option value="Mancare">Mancare</option>
                            <option value="Bautura">Bautura</option>
                        </select>
                        @error('type') <span class="text-red-500">{{ $message }}</span>@enderror

                    </div>
                    <div class="mb-4">
                        <label for="stock_id" class="block text-gray-700 text-sm font-bold mb-2">Stoc</label>
                        <select wire:model.defer="stock_id" id="stock_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Selecteaza stoc</option>
                            @foreach ($stocks as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('stock_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="menu_id" class="block text-gray-700 text-sm font-bold mb-2">Obiect</label>
                        <select wire:model.defer="menu_id" id="menu_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Selecteaza obiect</option>
                            @foreach ($menu_items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('menu_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="starting_stock" value="{{ __('Cantitate') }}" />
                        <x-jet-input id="starting_stock" type="text" class="mt-1 block w-full" wire:model.defer="starting_stock"
                            placeholder="Cantitate de inceput" />
                        <x-jet-input-error for="starting_stock" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="inventory_date" value="{{ __('Data') }}" />
                        <x-jet-input id="inventory_date" type="date" class="mt-1 block w-full"
                            wire:model.defer="inventory_date" placeholder="Data"/>
                        <x-jet-input-error for="inventory_date" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descriere:</label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="description" wire:model.defer="description" placeholder="Detalii"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click.prevent="store()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
        </form>
    </x-slot>
</x-jet-dialog-modal>
