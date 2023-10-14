<?php

namespace App\Http\Livewire\Admin\Item;

use Livewire\Component;
use App\Models\Admin\Photo;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DeletedItems extends Component
{
    use WithPagination;
    public $deleted_items;
    public $items_photos;

    public function render()
    {
        return view('livewire.admin.item.deleted-items');
    }

    public function mount()
    {
        $this->items_photos = Photo::with('item')->get();
        $this->deleted_item();
    }

    public function deleted_item()
    {
        $this->deleted_items = DB::table('items')->where('deleted_at', '<>', null)->get();
    }
    public function restore_item($id)
    {
        DB::table('items')->where('id', $id)->where('deleted_at', '<>', null)
            ->update([
                'deleted_at' => null,
                'by' => Auth::guard('admin')->user()->username,
            ]);
        $this->mount();
        return Session::flash('restored_item', 'Item restored successfully.');
    }

    public function harddelete_item($id)
    {
        $item_id = DB::table('items')->where('id', $id)->first();
        $item_photo =  DB::table('photos')->where('item_id', $item_id->id)->get();
        foreach ($item_photo as $key) {
            unlink(public_path(Storage::url($key->name)));
        }
        DB::table('items')->where('id', $id)->delete();
        $this->mount();
        return Session::flash('harddeleted_item', 'Item deleted permanently successfully.');
    }
}
