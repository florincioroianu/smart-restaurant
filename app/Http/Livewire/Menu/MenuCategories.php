<?php

namespace App\Http\Livewire\Menu;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class MenuCategories extends Component
{
    use WithPagination;

    public function render(): Factory|View|Application
    {
        return view('livewire.menu.menu-categories', [
            'menuCategories' => Category::all()
        ]);
    }
}
