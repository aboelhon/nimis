<?php

namespace App\Http\Livewire;

use App\Models\Admin\Category;
use Livewire\Component;
use App\Models\Admin\Item;

class Index extends Component
{
    public function render()
    {
        return view('livewire.index', [
            'all_items' => Item::where('status', 'public')->get(),
        ]);
    }
}
