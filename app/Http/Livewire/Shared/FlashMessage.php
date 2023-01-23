<?php

namespace App\Http\Livewire\Shared;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FlashMessage extends Component
{
    public $listeners = ['message' => 'flashMessage'];

    public function render(): Factory|View|Application
    {
        return view('livewire.shared.flash-message');
    }

    public function flashMessage($type, $message){
        session()->flash($type, $message);
    }
}
