<?php

namespace App\Http\Livewire\Category\Men;

use Livewire\Component;
use App\Models\Admin\Item;
use App\Models\Admin\Category;

class Pants extends Component
{
    public function render()
    {
        return view('livewire.category.men.pants', [
            'pants' => Item::where('department', 'men')->get(),
           
        ]);
    }
}
