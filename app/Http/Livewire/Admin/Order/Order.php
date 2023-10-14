<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Admin\Item;
use App\Models\User\Order as UserOrder;
use App\Models\User\User;
use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        return view('livewire.admin.order.order', [
            'all_orders' => UserOrder::all(),
            'all_users' => User::all(),
            'all_items' => Item::all(),
        ]);
    }

    public function order_confirm($value)
    {
        UserOrder::findorfail($value)->update([
            'status' => 'delivered',
        ]);
    }
    public function delete_order($value)
    {
        UserOrder::findorfail($value)->delete();
    }
}
