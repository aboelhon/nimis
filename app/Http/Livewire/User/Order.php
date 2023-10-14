<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\Cart;
use App\Models\Admin\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Order as UserOrder;

class Order extends Component
{
    public function render()
    {
        return view('livewire.user.order', [
            'user_orders' => UserOrder::where('user_id', Auth::guard('user')->user()->id)->get(),
            'items' => Item::get(),
            'item_quantity' => Cart::with('user')->where('user_id', Auth::guard('user')->user()->id)->get(),
        ]);
    }

    
}
