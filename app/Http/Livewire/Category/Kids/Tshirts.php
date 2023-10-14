<?php

namespace App\Http\Livewire\Category\Kids;

use Livewire\Component;
use App\Models\Admin\Item;

class Tshirts extends Component
{
    public function render()
    {
        return view('livewire.category.kids.tshirts',[
            'tshirts' => Item::where('department', 'kids')->get(),
        ]);
    }
}
