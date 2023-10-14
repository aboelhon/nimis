<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\User\User;
use App\Models\Admin\Item;
use App\Models\User\Order;

class DeliveredOrder extends Component
{
    public function render()
    {
        return view('livewire.admin.order.delivered-order', [
            'delivered_orders' => Order::where('status', 'delivered')->get(),
            'all_users' => User::all(),
            'all_items' => Item::all(),
        ]);
    }
}
