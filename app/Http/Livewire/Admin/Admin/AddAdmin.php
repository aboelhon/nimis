<?php

namespace App\Http\Livewire\Admin\Admin;

use Livewire\Component;
use App\Models\Admin\Admin;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AddAdmin extends Component
{
    use WithFileUploads;
    public $name;
    public $username;
    public $email;
    public $password;
    public $birthdate;
    public $address;
    public $phone;
    public $photo;
    public $role;
    public $status;
    public $rules;
    public function render()
    {
        return view('livewire.admin.admin.add-admin');
    }
    public function reset_inputs()
    {
        $this->name = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->birthdate = '';
        $this->address = '';
        $this->phone = '';
        $this->photo = '';
        $this->role = '';
        $this->status = '';
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required|string|min:4|max:64',
            'username' => 'required|string|unique:admins,username|regex:/^[^\s]+$/|min:4|max:10',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|max:16',
            'birthdate' => 'required|date',
            'address' => 'required|string|min:6|max:255',
            'phone' => 'required|unique:admins,phone|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'photo' => 'required|image|mimes:jpg,png,gif',
            'status' => 'required|in:active,inactive',
        ]);
    }
    public function add_admin()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:15',
            'username' => 'required|string|unique:admins,username|regex:/^[^\s]+$/|min:4|max:10',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|max:16',
            'birthdate' => 'required|date',
            'address' => 'required|string|min:6|max:255',
            'phone' => 'required|unique:admins,phone|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'photo' => 'required|image|mimes:jpg,png,gif',
            'status' => 'required|in:active,inactive',
        ]);

        Admin::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'phone' => $this->phone,
            'photo' => $this->photo->store('admin/admin-photo', 'public'),
            'role' => 'admin',
            'status' => $this->status,
            'by' => Auth::guard('admin')->user()->username,
        ]);
        $this->reset_inputs();
        return Session::flash('added_admin', 'Admin added successfully.');
    }
}
