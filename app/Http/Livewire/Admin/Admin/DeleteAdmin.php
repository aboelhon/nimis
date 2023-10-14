<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DeleteAdmin extends Component
{
    public $alldeletedadmins;
    public function render()
    {
        return view('livewire.admin.admin.delete-admin');
    }
    public function mount()
    {
        $this->showdeletedadmin();
    }
    public function showdeletedadmin()
    {
        $this->alldeletedadmins = DB::table('admins')->where('deleted_at', '<>', null)->get();
    }
    public function harddelete($id)
    {
        $photo = DB::table('admins')->where('id', $id)->first();
        unlink(public_path(Storage::url($photo->photo)));
        DB::table('admins')->where('id', $id)->delete();
        $this->mount();
        return  Session::flash('harddeleted_admin', 'Admin deleted permanently successfully.');
    }
    public function restoredeletedadmin($id)
    {
        DB::table('admins')->where('id', $id)->where('deleted_at', '<>', null)
            ->update([
                'deleted_at' => null,
                'by' => Auth::guard('admin')->user()->username,
            ]);
        $this->mount();
        return Session::flash('restored_admin', 'Admin restored successfully.');
    }
}
