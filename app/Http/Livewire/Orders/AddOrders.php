<?php

namespace App\Http\Livewire\Orders;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddOrders extends Component
{
    public float $tax = 17.5;
    public bool $card_pay = false;

    public function render(): Factory|View|Application
    {
        return view('livewire.orders.add-orders');
    }
}
