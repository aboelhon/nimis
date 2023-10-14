<?php

namespace App\Http\Livewire\Category\Women;

use Livewire\Component;
use App\Models\Admin\Item;

class Tshirts extends Component
{
    public function render()
    {
        return view('livewire.category.women.tshirts', [
            'tshirts' => Item::where('department', 'women')->get(),
             
        ]);
    }
}
