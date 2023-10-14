<?php

namespace App\Http\Livewire\Category\Women;

use Livewire\Component;
use App\Models\Admin\Item;

class Shoes extends Component
{
    public function render()
    {
        return view('livewire.category.women.shoes', [
            'shoes' => Item::where('department', 'women')->get(),
          
        ]);
    }
}
