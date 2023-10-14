<?php

namespace App\Http\Livewire\Category\Kids;

use Livewire\Component;
use App\Models\Admin\Item;

class Shoes extends Component
{
    public function render()
    {
        return view('livewire.category.kids.shoes',[
            'shoes' => Item::where('department', 'kids')->get(),
        ]);
    }
    
}
