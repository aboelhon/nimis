<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin\Admin;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AllAdmin extends Component
{
    use WithPagination, WithFileUploads;
    public $alladmins;
    public $paginate;
    public $admin_id;
    public $name;
    public $username;
    public $email;
    public $re_type_email;
    public $password;
    public $re_type_password;
    public $birthdate;
    public $address;
    public $phone;
    public $re_type_phone;
    public $photo;
    public $role;
    public $status;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.admin.all-admin', [
            'allad' => Admin::paginate(2),
        ]);
    }
    public function reset_inputs()
    {
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->re_type_email = '';
        $this->password = '';
        $this->re_type_password = '';
        $this->birthdate = '';
        $this->address = '';
        $this->phone = '';
        $this->re_type_phone = '';
        $this->photo = '';
        $this->role = '';
        $this->status = '';
    }

    public function getinfo($id)
    {
        $admin = Admin::findorfail($id);
        $this->admin_id = $admin->id;
        $this->name = $admin->name;
        $this->username = $admin->username;
        $this->email = $admin->email;
        $this->password = $admin->password;
        $this->password = $admin->password;
        $this->address = $admin->address;
        $this->phone = $admin->phone;
        $this->photo = $admin->photo;
        $this->role = $admin->role;
        $this->status =  $admin->status;
    }

    public function update_admininfo()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:64',
            'address' => 'required|string|min:6|max:255',
        ]);
        Admin::findorfail($this->admin_id)->update([
            'name' => $this->name,
            'address' => $this->address,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('info_admin', 'Admin information updated successfully.');
    }

    public function update_email()
    {
        $this->validate([
            'email' => 'required|email|unique:admins,email',
            're_type_email' => 'required|email|same:email',
        ]);
        Admin::findorfail($this->admin_id)->update([
            'email' => $this->email,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('email_admin', 'Admin email updated successfully.');
    }
    public function update_password()
    {
        $this->validate([
            'password' => 'required|string|min:6|max:16',
            're_type_password' => 'required|same:password|string|min:6|max:16',
        ]);
        Admin::findorfail($this->admin_id)->update([
            'password' => Hash::make($this->password),
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('password_admin', 'Admin password updated successfully.');
    }

    public function update_phone()
    {
        $this->validate([
            'phone' => 'required|unique:admins,phone|numeric|digits:11|regex:/(01)[0-9]{9}/',
            're_type_phone' => 'required|same:phone|numeric|digits:11|unique:admins,phone|regex:/(01)[0-9]{9}/',
        ]);
        Admin::findorfail($this->admin_id)->update([
            'phone' => $this->phone,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('phone_admin', 'Admin phone updated successfully.');
    }

    public function update_photo()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpg,png,gif',
        ]);
        $db_photo = Admin::findorfail($this->admin_id);
        unlink(public_path(Storage::url($db_photo->photo)));
        Admin::findorfail($this->admin_id)->update([
            'photo' => $this->photo->store('admin/admin-photo', 'public'),
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('photo_admin', 'Admin photo updated successfully.');
    }

    public function update_status()
    {
        $this->validate([
            'status' => 'required|in:active,inactive'
        ]);
        Admin::findorfail($this->admin_id)->update([
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        return Session::flash('status_admin', 'Admin status updated successfully.');
    }

    public function update_username()
    {
        $this->validate([
            'username' => 'required|string|unique:admins,username|regex:/^[^\s]+$/|min:4|max:10',
        ]);
        Admin::findorfail($this->admin_id)->update([
            'username' => $this->username,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        return Session::flash('username_admin', 'Admin username updated successfully.');
    }

    public function update_birthdate()
    {
        $this->validate([
            'birthdate' => 'required|date'
        ]);
        Admin::findorfail($this->admin_id)->update([
            'birthdate' => $this->birthdate,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        return Session::flash('birthdate_admin', 'Admin birthdate updated successfully.');
    }

    public function softdeleteadmin($id)
    {
        $this->mount();
        $del = Admin::where('id', $id)->first();
        $del->delete();
        return Session::flash('deleted_admin', 'Admin deleted successfully.');
    }
}
