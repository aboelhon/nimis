<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\Cart;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    protected $listeners = ['refreshcart'=> '$refresh','empty_cart'=> '$refresh'];
    public function render()
    {
        return view('livewire.user.navbar',[
            'countitem' => Cart::where('user_id',Auth::guard('user')->user()->id)
            ->sum('card_item_quantity'),
        ]);
    }
  
}
