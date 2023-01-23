<?php

namespace App\Http\Livewire\Shared;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Modal extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.shared.modal');
    }
}
