<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category as ModelsMenuCategory;
use App\Traits\LivewireUtil;
use Livewire\Component;

class Category extends Component
{
    use LivewireUtil;

    public string $name = '';
    public bool $is_main_dish = false;
    public string $type = 'food';

    private array $fillable = ['name', 'type', 'is_main_dish'];
    private array $validation_rule = [
        'name' => 'required',
        'type' => 'required|in:food,drink',
        'is_main_dish' => 'boolean'
    ];

    public function mount()
    {
        $this->Model = new ModelsMenuCategory();
        $this->fills = $this->fillable;
        $this->rules = $this->validation_rule;
    }

    public function render()
    {
        return view('livewire.admin.menu-category')->layout('layouts.admin');
    }

}
