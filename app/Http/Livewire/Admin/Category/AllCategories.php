<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AllCategories extends Component
{
    use WithPagination;
    public $cat_id;
    public $category_name;
    public $category_description;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.admin.category.all-categories', [
            'all_categories' => Category::paginate(6)
        ]);
    }
    public function reset_inputs()
    {
        $this->cat_id = '';
        $this->category_name = '';
        $this->category_description = '';
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'category_name' => 'required|string|min:3|max:25|unique:categories,name',
            'category_description' => 'required|string|min:5|max:80',
        ]);
    }

    public function get_categories($id)
    {
        $all_cats = Category::findorfail($id);
        $this->cat_id = $all_cats->id;
        $this->category_name = $all_cats->name;
        $this->category_description = $all_cats->description;
    }
    public function update_categories()
    {
        $this->validate([
            'category_name' => 'required|string|min:3|max:25|unique:categories,name',
            'category_description' => 'required|string|min:5|max:80',
        ]);
        Category::findorfail($this->cat_id)->update([
            'name' => $this->category_name,
            'description' => $this->category_description,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('updated_category', 'Category updated successfully.');
    }
    public function softdelete_category($id)
    {
        Category::findorfail($id)->delete();
        return Session::flash('deleted_category', 'Category deleted successfully.');
    }
}
