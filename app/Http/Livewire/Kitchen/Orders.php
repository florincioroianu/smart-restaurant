<?php

namespace App\Http\Livewire\Kitchen;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Orders extends Component
{
    public bool $play_sound = false;
    public array $received_orders = [];
    public array $processed_orders = [];
    public array $new_orders = [];

    protected $listeners = ['orderAdded' => '$refresh'];

    public function receiveOrder($order)
    {
        $order = Order::find($order[0]['order_id']);
        $order->status = 'received';
        $order->save();

        $this->setNewOrders();
        $this->setReceivedOrders();
    }

    private function setNewOrders()
    {
        $orders = Order::newOrders()->get();

        $this->new_orders = [];

        foreach ($orders as $order) {
            $order_details = OrderDetails::belongsToOrder($order->id)->isFood()->get();
            if ($order_details && sizeof($order_details) > 0) {
                $this->new_orders[] = $order_details;
            }
        }

    }

    private function setReceivedOrders()
    {
        $orders = Order::receivedOrders()->get();

        $this->received_orders = [];

        foreach ($orders as $order) {
            $order_details = OrderDetails::belongsToOrder($order->id)->isFood()->get();
            if ($order_details && sizeof($order_details) > 0) {
                $this->received_orders[] = $order_details;
            }
        }
    }

    public function processOrder($order)
    {
        $order = Order::find($order[0]['order_id']);
        $order->status = 'processed';
        $order->save();

        $this->setProcessedOrders();
        $this->setReceivedOrders();

    }

    private function setProcessedOrders()
    {
        $orders = Order::processedOrders()->limit(10)->get();

        $this->processed_orders = [];

        foreach ($orders as $order) {
            $order_details = OrderDetails::belongsToOrder($order->id)->isFood()->get();
            if ($order_details && sizeof($order_details) > 0) {
                $this->processed_orders[] = $order_details;
            }
        }
    }

    public function cancelOrder($order)
    {
        Order::find($order[0]['order_id'])->delete();
        OrderDetails::whereOrderId($order[0]['order_id'])->delete();

        $this->setReceivedOrders();
    }


    public function render(): Factory|View|Application
    {
        $this->setNewOrders();
        $this->setReceivedOrders();
        $this->setProcessedOrders();

        return view('livewire.kitchen.orders');
    }
}
