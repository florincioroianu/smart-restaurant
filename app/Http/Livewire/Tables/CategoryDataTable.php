<?php

namespace App\Http\Livewire\Tables;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class CategoryDataTable extends LivewireDatatable
{
    public $model = Category::class;
    public $hideable = 'select';
    public $exportable = true;

    public function columns(): array
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id')
                ->label('ID')
                ->delete(),

            Column::name('name')
                ->label('Nume')
                ->editable()
                ->searchable()
                ->filterable(),

            Column::name('type')
                ->searchable($this->menuTypes)
                ->editable()
                ->filterable(),

            BooleanColumn::callback(['is_main_dish'], function ($is_main_dish) {
                if (!$is_main_dish) {
                    return 'No';
                }
                return 'Yes';
            })
                ->label('Main Dish')
                ->filterable(),
        ];
    }

    public function getMenuTypesProperty(): array
    {
        return ['food', 'drink'];
    }
}
