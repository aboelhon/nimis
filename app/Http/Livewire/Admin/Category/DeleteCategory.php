<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DeleteCategory extends Component
{
    public $deleted_cats;
    public function render()
    {
        return view('livewire.admin.category.delete-category');
    }

    public function mount()
    {
        $this->deleted_categories();
    }

    public function deleted_categories()
    {
        $this->deleted_cats = DB::table('categories')->where('deleted_at', '<>', null)->get();
    }

    public function restore_category($id)
    {
        DB::table('categories')->where('deleted_at', '<>', null)->where('id', $id)
            ->update([
                'deleted_at' => null,
                'by' => Auth::guard('admin')->user()->username,
            ]);
        $this->mount();
        return Session::flash('restored_category', 'Category restored successfully.');
    }

    public function harddelete_category($id)
    {
        DB::table('categories')->where('deleted_at', '<>', null)->where('id', $id)
            ->delete();
        $this->mount();
        return Session::flash('harddeleted_category', 'Category deleted for every successfully.');
    }
}
