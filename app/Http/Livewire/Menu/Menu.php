<?php

namespace App\Http\Livewire\Menu;

use App\Models\Menu as ModelsMenu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Menu extends Component
{
    use WithPagination;

    public function render(): Factory|View|Application
    {
        return view('livewire.menu.menu', [
            'menu' => ModelsMenu::all()
        ]);
    }
}
