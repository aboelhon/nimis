<?php

namespace App\Http\Livewire\Admin\Item;

use Livewire\Component;
use App\Models\Admin\Item;
use App\Models\Admin\Photo;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Storage;

class AllItems extends Component
{
    use WithPagination, WithFileUploads;
    public $id_item;
    public $item_name;
    public $item_des;
    public $item_price;
    public $item_status;
    public $item_size;
    public $item_quantity;
    public $item_photo = [];
    public $item_category;
    public $item_department;
    public $item_cat_id = [];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.item.all-items', [
            'all_items' => Item::with('categories')->paginate(2),
            'all_categories' => Category::all(),
        ]);
    }
    public function mount()
    {
    }
    public function reset_inputs()
    {
        $this->id_item = '';
        $this->item_name = '';
        $this->item_des = '';
        $this->item_price = '';
        $this->item_photo = '';
        $this->item_quantity = '';
        $this->item_status = '';
        $this->item_size = '';
        $this->item_department = '';
        $this->item_category = '';
        $this->item_cat_id = '';
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'item_name' => 'string|min:4|max:50',
            'item_des' => 'string|min:4|max:100',
            'item_price' => 'integer',
            'item_photo' => 'required',
            'item_photo.*' => 'required|image|mimes:jpg,png,gif|dimensions:min_width=100,min_height=100',
            'item_size' => 'in:s,m,l,xl,xxl,xxxl',
            'item_quantity' => 'integer',
            'item_status' => 'in:public,private',
            'item_department' => 'in:men,women,kids',
            'item_category' => 'exists:categories,id',
        ]);
    }

    public function get_items($id)
    {
        $all_cats = Item::with('categories')->findorfail($id);
        $this->id_item = $all_cats->id;
        $this->item_name = $all_cats->name;
        $this->item_des = $all_cats->description;
        $this->item_price = $all_cats->price;
        $this->item_status = $all_cats->status;
        $this->item_size = $all_cats->size;
        $this->item_quantity = $all_cats->quantity;
        $this->item_photo = $all_cats->photo;
        $this->item_category = $all_cats->categories;
    }
    public function update_items()
    {
        $this->validate([
            'item_name' => 'string|min:3|max:25',
            'item_des' => 'string|min:5|max:80',
            'item_price' => 'integer',
        ]);

        Item::findorfail($this->id_item)->update([
            'name' => $this->item_name,
            'description' => $this->item_des,
            'price' => $this->item_price,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('updated_item', 'Item upated successfully.');
    }
    public function update_item_category()
    {
        $this->validate([
            'item_cat_id' => 'exists:categories,id',
        ]);
        $update_item_category = Item::findorfail($this->id_item);
        $update_item_category->update([
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $update_item_category->categories()->sync($this->item_cat_id);
        $this->reset_inputs();
        return Session::flash('updated_item_category', 'Item\'s category upated successfully.');
    }
    public function update_item_quantity()
    {
        $this->validate([
            'item_quantity' => 'integer',
        ]);
        Item::findorfail($this->id_item)->update([
            'quantity' => $this->item_quantity,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('updated_item_quantity', 'Item\'s quantity upated successfully.');
    }
    public function update_item_department()
    {
        $this->validate([
            'item_department' => 'in:men,women,kids',
        ]);
        Item::findorfail($this->id_item)->update([
            'department' => $this->item_department,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('updated_item_department', 'Item\'s department upated successfully.');
    }
    public function update_item_size()
    {
        $this->validate([
            'item_size' => 'in:s,m,l,xl,xxl,xxxl',
        ]);
        Item::findorfail($this->id_item)->update([
            'size' => $this->item_size,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('updated_item_size', 'Item\'s size upated successfully.');
    }
    public function update_item_status()
    {
        $this->validate([
            'item_status' => 'in:public,private',
        ]);
        Item::findorfail($this->id_item)->update([
            'status' => $this->item_status,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('updated_item_status', 'Item\'s status upated successfully.');
    }
    public function update_photo()
    {
        $this->validate([
            'item_photo' => 'required',
            'item_photo.*' => 'required|image|mimes:jpg,png,gif|dimensions:min_width=100,min_height=100',
        ]);

        $db_photo = Item::findorfail($this->id_item);  // DELETE PHOTO RELATED TO ITEM
        foreach ($db_photo->photos as $key) {
            unlink(public_path(Storage::url($key->name)));
            DB::table('photos')->where('item_id', $db_photo->id)->delete();
        }
        foreach ($this->item_photo as $key) {
            Photo::create([
                'item_id' => $this->id_item,
                'name' =>  $key->store('items/item-photo', 'public'),
                'by' => Auth::guard('admin')->user()->username,
            ]);
        }
        $this->reset_inputs();
        return Session::flash('updated_photo', 'Item photo upated successfully.');
    }
    public function softdelete_item($id)
    {
        Item::findorfail($id)->delete();
        return Session::flash('deleted_item', 'Item deleted successfully.');
        $this->mount();
    }
}
