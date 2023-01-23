<?php

namespace App\Http\Livewire\Tables;

use App\Models\Inventory as ModelsInventory;
use App\Models\Menu;
use App\Models\Stock;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class Inventory extends LivewireDatatable
{
    public $model = ModelsInventory::class;

    public function builder()
    {
        return ModelsInventory::with('menu', 'stock');
    }

    public function columns(): array
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')->label('ID'),
            NumberColumn::name('starting_stock')->filterable()->searchable(),
            NumberColumn::name('current_stock')->filterable()->searchable(),
            Column::name('type')->filterable(['food', 'drink'])->searchable(),
            Column::name('menu.name')->label('Item')->filterable($this->items)->searchable(),
            Column::name('stock.name')->label('Stoc')->filterable($this->stock)->searchable(),
            DateColumn::name('inventory_date')->filterable()->searchable(),
            Column::name('description')->filterable()->searchable(),
        ];
    }

    public function getItemsProperty()
    {
        return Menu::pluck('name');
    }

    public function getStockProperty()
    {
        return Stock::pluck('name');
    }
}
