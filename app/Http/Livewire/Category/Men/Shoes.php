<?php

namespace App\Http\Livewire\Category\Men;

use Livewire\Component;
use App\Models\Admin\Item;
use App\Models\Admin\Category;

class Shoes extends Component
{
    public function render()
    {
        return view('livewire.category.men.shoes', [
            'shoes' => Item::where('department', 'men')->get(),
          
        ]);
    }
}
