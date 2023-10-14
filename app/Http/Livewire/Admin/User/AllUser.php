<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use  App\Models\User\User;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AllUser extends Component
{
    use WithPagination, WithFileUploads;
    public $paginate;
    public $user_id;
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
        return view('livewire.admin.user.all-user', [
            'allusers' => User::paginate(2),
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
        $user = User::findorfail($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->password = $user->password;
        $this->address = $user->address;
        $this->phone = $user->phone;
        $this->photo = $user->photo;
        $this->role = $user->role;
        $this->status =  $user->status;
    }

    public function updatuserinfo()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:64',
            'address' => 'required|string|min:6|max:255',
        ]);
        User::findorfail($this->user_id)->update([
            'name' => $this->name,
            'address' => $this->address,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('info_user', 'User information updated successfully.');
    }

    public function updateemail()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            're_type_email' => 'required|email|same:email',
        ]);
        User::findorfail($this->user_id)->update([
            'email' => $this->email,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('email_user', 'Email updated successfully.');
    }
    public function updatepassword()
    {
        $this->validate([
            'password' => 'required|string|min:6|max:16',
            're_type_password' => 'required|same:password|string|min:6|max:16',
        ]);
        User::findorfail($this->user_id)->update([
            'password' => Hash::make($this->password),
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('password_user', 'User password updated successfully.');
    }

    public function updatephone()
    {
        $this->validate([
            'phone' => 'required|unique:users,phone|numeric|digits:11|regex:/(01)[0-9]{9}/',
            're_type_phone' => 'required|same:phone|numeric|digits:11|unique:users,phone|regex:/(01)[0-9]{9}/',
        ]);
        User::findorfail($this->user_id)->update([
            'phone' => $this->phone,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('phone_user', 'User phone updated successfully.');
    }

    public function updatephoto()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpg,png,gif',
        ]);
        $db_photo = User::findorfail($this->user_id);
        unlink(public_path(Storage::url($db_photo->photo)));
        User::findorfail($this->user_id)->update([
            'photo' => $this->photo->store('user/user-photo', 'public'),
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('photo_user', 'User photo updated successfully.');
    }

    public function updatestatus()
    {
        $this->validate([
            'status' => 'required|in:active,inactive'
        ]);
        User::findorfail($this->user_id)->update([
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        return Session::flash('status_user', 'User status updated successfully.');
    }

    public function updatebirthdate()
    {
        $this->validate([
            'birthdate' => 'required|date'
        ]);
        User::findorfail($this->user_id)->update([
            'birthdate' => $this->birthdate,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        return Session::flash('birthdate_user', 'User birthdate updated successfully.');
    }

    public function softdeleteuser($id)
    {
        $this->mount();
        $del = User::where('id', $id)->first();
        $del->delete();
        return Session::flash('deleted_user', 'User deleted successfully.');
    }
}
