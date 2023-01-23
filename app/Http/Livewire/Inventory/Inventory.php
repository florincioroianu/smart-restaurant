<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Inventory as ModelsInventory;
use App\Models\Menu;
use App\Models\Stock;
use App\Traits\LivewireUtil;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Inventory extends Component
{
    use LivewireUtil;

    public $stock_id, $menu_id, $starting_stock, $current_stock, $inventory_date, $description, $type,
        $menu_items, $stocks;

    private $fillable = ['stock_id', 'menu_id', 'starting_stock', 'current_stock', 'description', 'type', 'inventory_date'];

    protected $rules = [
        'stock_id' => 'integer|required|exists:stocks,id',
        'menu_id' => 'integer|required|exists:menus,id',
        'starting_stock' => 'integer|required',
        'description' => 'string|nullable',
        'type' => 'string|required|exists:types,type',
        'inventory_date' => 'date|required'
    ];

    public function store()
    {
        $this->validate();

        $data = [];

        foreach ($this->fills as $key) {
            $data["{$key}"] = $this->{$key};
        }

        $this->current_stock = $this->starting_stock;

        $this->Model->updateOrCreate(['id' => $this->modal_id], $data);
        $this->emitTo('shared.flash-message', 'message', 'success', $this->modal_id ? 'Update Successful' : 'Record Created Successfully.');

        $this->emit('refreshLivewireDatatable');

        $this->resetInputFields();
        $this->closeModal();
    }

    public function mount(ModelsInventory $model){
        $this->Model = $model;
        $this->fills = $this->fillable;
    }

    public function render(): Factory|View|Application
    {
        $this->stocks = Stock::all();
        $this->menu_items = Menu::all();
        return view('livewire.inventory.inventory');
    }
}
