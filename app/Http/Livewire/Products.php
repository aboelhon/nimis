<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User\Cart;
use App\Models\Admin\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Products extends Component
{
    public $item;
    public $quantity;
    public function render()
    {
        return view('livewire.products', [
            'products' =>  Item::all(),
            'cart_count' => Cart::where('user_id', Auth::guard('user')->user()->id->count(),
        ]);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'quantity' => 'required|integer|max:10|gt:0'
        ]);
    }
    public function add_to_card($id)
    {
        $this->validate([
            'quantity' => 'required|integer|max:10|gt:0',
        ]);
        Cart::create([
            'user_id' => Auth::guard('user')->user()->id,
            'item_id' => $id,
            'card_item_quantity' => $this->quantity,
        ]);
        $this->quantity = '';
        $this->emit('refreshcart');
        return Session::flash('saved_item_to_cart', 'Product added to your cart successfully');
    }
}
