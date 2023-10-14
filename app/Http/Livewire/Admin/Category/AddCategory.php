<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AddCategory extends Component
{
    use WithPagination;
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.admin.category.add-category');
    }
    public function mount()
    {
        $this->reset_inputs();
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|string|min:3|max:25|unique:categories,name',
            'description' => 'required|string|min:5|max:80',
        ]);
    }
    public function reset_inputs()
    {
        $this->name = '';
        $this->description = '';
    }
    public function addcategory()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:25|unique:categories,name',
            'description' => 'required|string|min:5|max:80',
        ]);
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('added_category', 'Category added successfully.');
    }
}
