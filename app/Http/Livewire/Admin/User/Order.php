<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User\Order as UserOrder;
use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        return view('livewire.admin.user.order',[
            'all_orders'=> UserOrder::all()
        ]);
    }
}
