<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\User;
use App\Mail\ActiveUserCode;
use Livewire\WithFileUploads;
use App\Models\User\ActiveUserEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class Register extends Component
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
    public $status;
    public function render()
    {
        return view('livewire.user.register');
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

        $user =  User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'phone' => $this->phone,
            'photo' => $this->photo->store('user/user-photo', 'public'),
            'role' => 'user',
            'by' => $this->email,
        ]);
        $rand_active_code = random_int(100, 999);
        ActiveUserEmail::create([
            'user_email' => $user->email,
            'active_code' => $rand_active_code,
        ]);
        Mail::to($user->email)
            ->send(new ActiveUserCode($rand_active_code, $user->name));
        $this->reset_inputs();
        return Session::flash('added_user', 'Register completed successfully PLEASE CHECK YOUR E-MAIL TO ACTIVATE YOUR ACCOUNT.');
    }
}
