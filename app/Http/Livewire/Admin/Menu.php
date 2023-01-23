<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Menu extends Component
{
    public $input = [
        'name' => '',
        'menu_category_id' => 1,
        'price' => 0,
        'quantity' => 0
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.admin.menu');
    }
}
