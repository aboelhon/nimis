<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\Cart;
use App\Models\Admin\Item;
use App\Models\User\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Checkout extends Component
{
    public $user_cart;
    public $items;
    public $price;
    public $totalPrice; // Add total price property  GPT APPROACH
    public $checkCart; // Add total price property  GPT APPROACH


    // public $item_ids = []; // Store item_ids in an array
    public $user_id;
    public $item_id;
    public $item_price;
    public $item_quantity;
    public $country;
    public $first_name;
    public $last_name;
    public $address;
    public $city;
    public $postcode;
    public $email;
    public $phone;
    public $notes;
    public $conf;


    public $itq = [];
    public $itp = '';
    public function render()
    {
        $this->totalPrice = $this->calculateTotalPrice();
        return view('livewire.user.checkout');
    }

    public function mount()
    {
        $this->user_cart = Cart::where('user_id', Auth::guard('user')->user()->id)
            ->get();
        $this->items = Item::get();
    }
    private function calculateTotalPrice()
    {

        foreach ($this->user_cart as $cart) {
            foreach ($this->items as $item) {
                if ($cart->item_id == $item->id) {
                    $this->totalPrice += $item->price * $cart->card_item_quantity;
                }
            }
        }
        return   $this->totalPrice;
    }

    public function save_order()
    {
        $this->validate([
            // 'item_price' =>'required|exists:items,price',
            // 'item_quantity' =>'required|exists:items,quantity',
            'country' => 'required|string|',
            'first_name' => 'required|string|max:60',
            'last_name' => 'required|string|max:60',
            'address' => 'required|string|max:300',
            'city' => 'required|string|max:30',
            'postcode' => 'nullable|numeric',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'notes' => 'nullable|string|max:600',
            'conf' => 'accepted'
        ]);
        foreach ($this->user_cart as $cart) {
            $itemp  = Item::findorfail($cart->item_id);
            Order::create([
                'user_id' => Auth::guard('user')->user()->id,
                'item_id' => $cart->item_id,  // Use item_id from the cart
                'item_price' => $itemp->price,
                'item_quantity' => $cart->card_item_quantity,
                'country' => $this->country,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'address' => $this->address,
                'city' => $this->city,
                'postcode' => $this->postcode,
                'email' => $this->email,
                'phone' => $this->phone,
                'notes' => $this->notes,
                'by' => Auth::guard('user')->user()->name,
            ]);

            DB::table('carts')->where('item_id', $cart->item_id)->delete();
        }

        $this->emit('empty_cart');
        $this->user_id = "";
        $this->item_id = "";
        $this->country = "";
        $this->first_name = "";
        $this->last_name = "";
        $this->address = "";
        $this->city = "";
        $this->postcode = "";
        $this->email = "";
        $this->phone = "";
        $this->notes = "";
        return redirect(route('user.order'));
    }
}
