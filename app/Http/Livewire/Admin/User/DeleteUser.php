<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DeleteUser extends Component
{
    public $alldeletedusers;
    public function render()
    {
        return view('livewire.admin.user.delete-user');
    }
    public function mount()
    {
        $this->showdeleteduser();
    }
    public function showdeleteduser()
    {
        $this->alldeletedusers = DB::table('users')->where('deleted_at', '<>', null)->get();
    }
    public function harddelete($id)
    {
        $photo = DB::table('users')->where('id', $id)->first();
        unlink(public_path(Storage::url($photo->photo)));
        DB::table('users')->where('id', $id)->delete();
        $this->mount();
        return  Session::flash('harddeleted_user', 'User deleted permanently successfully.');
    }
    public function restoredeleteduser($id)
    {
        DB::table('users')->where('id', $id)->where('deleted_at', '<>', null)
            ->update([
                'deleted_at' => null,
                'by' => Auth::guard('admin')->user()->username,
            ]);
        $this->mount();
        return Session::flash('restored_user', 'User restored successfully.');
    }
}
