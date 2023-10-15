<?php

namespace App\Http\Livewire\Admin\Order;

use Livewire\Component;
use App\Models\User\User;
use App\Models\Admin\Item;
use App\Models\User\Order;

class PendingOrder extends Component
{
    public function render()
    {
        return view('livewire.admin.order.pending-order',[
            'pending_orders' => Order::where('status', 'pending')->get(),
            'all_users' => User::all(),
            'all_items' => Item::all(),
        ]);
    }
    public function delete_order($value)
    {
        Order::findorfail($value)->delete();
    }
}
