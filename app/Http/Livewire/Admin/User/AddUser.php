<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Models\User\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AddUser extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $re_type_password;
    public $birthdate;
    public $address;
    public $phone;
    public $photo;
    public $role;
    public function render()
    {
        return view('livewire.admin.user.add-user');
    }
    public function reset_inputs()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->re_type_password = '';
        $this->birthdate = '';
        $this->address = '';
        $this->phone = '';
        $this->photo = '';
        $this->role = '';
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|string|min:4|max:64',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:16',
            're_type_password' => 'required|same:password|string|min:6|max:16',
            'birthdate' => 'required|date',
            'address' => 'required|string|min:6|max:255',
            'phone' => 'required|unique:users,phone|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'photo' => 'required|image|mimes:jpg,png,gif',
        ]);
    }
    public function add_user()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:60',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:16',
            're_type_password' => 'required|same:password|string|min:6|max:16',
            'birthdate' => 'required|date',
            'address' => 'required|string|min:6|max:255',
            'phone' => 'required|unique:users,id|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'photo' => 'required|image|mimes:jpg,png,gif',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'phone' => $this->phone,
            'photo' => $this->photo->store('user/user-photo', 'public'),
            'role' => 'user',
            'by' => Auth::guard('admin')->user()->username,
            'status' => 'active',
        ]);
        $this->reset_inputs();
        return Session::flash('added_user', 'User added successfully.');
    }
}
