<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Admin\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Cart as UserCart;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $quantity;
    public $showDiv = false;
    public function render()
    {
        return view('livewire.user.cart', [
            'user_cart' => UserCart::with('user')->where('user_id', Auth::guard('user')->user()->id)
                ->where('ordered', 'no')
                ->get(),
            'all_items' => Item::all(), // to bring photos() linked with items
        ]);
    }


    public function update_quantity($id)
    {
        $this->validate([
            'quantity' => 'required|integer|max:10'
        ]);
        UserCart::findorfail($id)->update([
            'card_item_quantity' =>  $this->quantity,
        ]);
        $this->quantity = '';
        $this->emit('refreshcart');
        return Session::flash('item_cart_updated', 'Your item\'s quantity updated successfully');
    }
    public function delete_cart($id)
    {
        UserCart::findorfail($id)->delete();
        $this->emit('refreshcart');
        return Session::flash('item_cart_deleted', 'Your item  deleted successfully');
    }
}
