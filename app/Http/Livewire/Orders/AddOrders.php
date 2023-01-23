<?php

namespace App\Http\Livewire\Orders;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddOrders extends Component
{
    public $card_pay = false, $tax = 17.5;

    public function render(): Factory|View|Application
    {
        return view('livewire.orders.add-orders');
    }
}
