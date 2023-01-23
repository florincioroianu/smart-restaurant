<?php

namespace App\Http\Livewire\Waitress;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class WaitressMenu extends Component
{
    public $card_pay = false, $tax = 17.5, $orders = [], $order_note = '';
    public $active_view = '', $cart_count = 0;


    public function changeView($view){
        $this->active_view = $view;
    }

    public function addOrder($menu, $is_food = 1){
        \Cart::add([
            'id' => $name = $menu['name'],
            'name' => $name,
            'price' => $menu['price'],
            'quantity' => 1,
            'attributes' => [
                'is_food' => $is_food,
                'menu_id' => $menu['id']
            ]
        ]);

        $this->setCartCount();
    }

    public function setCartCount(){
        $this->cart_count = \Cart::getContent()->count();
    }

    public function increaseItem($order){
        \Cart::update(''.$order['id'], [
            'quantity' => 1
        ]);
    }

    public function decreaseItem($order){
        \Cart::update(''.$order['id'], [
            'quantity' => -1
        ]);
    }


    public function removeItem($order) {
        \Cart::remove(''.$order['id']);
        $this->setCartCount();
    }

    public function clearItems() {
        \Cart::clear();
        $this->setCartCount();
    }

    public function saveOrder() {
        $card_pay = $this->card_pay;

        $main_order = Order::create([
            'user_id' => auth()->user()->id,
            'card_pay' => $card_pay,
            'total' => $total = \Cart::getTotal(),
            'sub_total' => $card_pay,
            'note' => $this->order_note,
            'status' => 'new'
        ]);

        $order_details = [];

        foreach(\Cart::getContent() as $order) {
            $order_details[] = [
                'order_id' => $main_order->id,
                'menu_id' => $order['attributes']['menu_id'],
                'title' => $order['name'],
                'quantity' => $order['quantity'],
                'is_food' => $order['attributes']['is_food'],
                'total' => $order['quantity'] * $order['price']
            ];

            if (! $order['attributes']['is_food']) {
                $inventory = Inventory::where('menu_id', $order['attributes']['menu_id'])->latest()->first();
                $inventory->current_stock = $inventory->starting_stock - $order['quantity'];
                $inventory->save();
            }

        }

        OrderDetails::insert($order_details);

        $this->emit('orderAdded');

        \Cart::clear();
        $this->setCartCount();
        $this->order_note = '';
        $this->card_pay = false;
    }

    public function mount(){
        \Cart::session(auth()->user()->id);
        $this->setCartCount();
    }

    public function render(): Factory|View|Application
    {
        $this->setCartCount();
        $drinks = Category::with('menu')->where('type', 'Bautura')->get();
        $foods = Category::with('menu')->where([
            ['type', 'Mancare'],
            ['is_main_dish', true]
        ])->get();

        return view('livewire.waitress.waitress-menu', [
            'drinks' => $drinks,
            'foods' => $foods,
            'cart_count' => \Cart::getContent()->count()
        ]);
    }
}
