<?php

namespace App\Http\Livewire\Category\Kids;

use Livewire\Component;
use App\Models\Admin\Item;

class Pants extends Component
{
    public function render()
    {
        return view('livewire.category.kids.pants',[
            'pants' => Item::where('department', 'kids')->get(),
        ]);
    }
}
