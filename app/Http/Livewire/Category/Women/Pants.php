<?php

namespace App\Http\Livewire\Category\Women;

use Livewire\Component;
use App\Models\Admin\Item;

class Pants extends Component
{
    public function render()
    {
        return view('livewire.category.women.pants', [
            'pants' => Item::where('department', 'women')->get(),
           
        ]);
    }
}
