<?php

namespace App\Http\Livewire\Admin\Item;

use Livewire\Component;
use App\Models\Admin\Item;
use App\Models\Admin\Photo;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AddItem extends Component
{
    use WithFileUploads;
    public $name;
    public $description;
    public $price;
    public $photo = [];
    public $quantity;
    public $size;
    public $color;
    public $status;
    public $department;
    public $get_cats;
    public $get_cats_id = [];
    public function render()
    {
        return view('livewire.admin.item.add-item');
    }
    public function mount()
    {
        $this->get_cats = Category::all();
    }
    public function reset_inputs()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->photo = '';
        $this->quantity = '';
        $this->size = '';
        $this->status = '';
        $this->department = '';
        $this->get_cats_id = [];
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:100',
            'price' => 'required|integer|min:50|',
            'photo' => 'required',
            // 'photo.*' => 'required|image|mimes:jpg,png,gif|dimensions:min_width=100,min_height=100',
            'photo.*' => 'required|image|mimes:jpg,png,gif',
            'size' => 'nullable|in:s,m,l,xl,xxl,xxxl',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|in:public,private',
            'department' => 'nullable|in:men,women,kids',
            'get_cats_id' => 'required|exists:categories,id',
        ]);
    }

    public function add_item()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:50',
            'description' => 'required|string|min:4|max:100',
            'price' => 'required|integer|min:50|',
            'photo' => 'required',
            // 'photo.*' => 'required|image|mimes:jpg,png,gif|dimensions:min_width=100,min_height=100',
            'photo.*' => 'required|image|mimes:jpg,png,gif',
            'size' => 'nullable|in:s,m,l,xl,xxl,xxxl',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required|in:public,private',
            'department' => 'nullable|in:men,women,kids',
            'get_cats_id' => 'required|exists:categories,id',
        ]);
        $items_id =  Item::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'size' => $this->size,
            'department' => $this->department,
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $items_id->categories()->sync($this->get_cats_id);
        foreach ($this->photo as $key) {
            Photo::create([
                'item_id' => $items_id->id,
                'name' =>  $key->store('items/item-photo', 'public'),
                'by' => Auth::guard('admin')->user()->username,
            ]);
        }
        $this->reset_inputs();
        return Session::flash('added_item', 'Item added successfully.');
    }
}
