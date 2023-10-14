<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\User;
use App\Mail\ActiveUserCode;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\User\ActiveUserEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserSettings extends Component
{
    use WithPagination, WithFileUploads;
    public $name;
    public $address;
    public $email;
    public $re_type_email;
    public $password;
    public $re_type_password;
    public $birthdate;
    public $phone;
    public $re_type_phone;
    public $photo;

    public function render()
    {
        return view('livewire.user.user-settings', [
            'info' => User::Where('id', Auth::guard('user')->user()->id)->simplePaginate(10),
        ]);
    }

    public function reset_inputs()
    {
        $this->name = '';
        $this->address = '';
        $this->email = '';
        $this->re_type_email = '';
    }

    public function update_name()
    {
        $this->validate([
            'name' => 'required|string|min:4|max:60',
            'address' => 'required|string|min:4|max:60',
        ]);
        $user = Auth::guard('user')->user()->id;
        DB::table('users')->where('id', $user)->update([
            'name' => $this->name,
            'address' => $this->address,
        ]);
        $this->reset_inputs();
        return back()->with('updated_info', 'Your name updated successfully.');
    }

    public function update_email()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            're_type_email' => 'required|email|same:email',
        ]);
        User::findorfail(Auth::guard('user')->user()->id)->update([
            'email' => $this->email,
            'by' => $this->email,
            'status' => 'inactive'
        ]);

        $rand_active_code = random_int(100, 999);
        ActiveUserEmail::create([
            'user_email' => $this->email,
            'active_code' => $rand_active_code,
        ]);
        Mail::to($this->email)
            ->send(new ActiveUserCode($rand_active_code, Auth::guard('user')->user()->name));
        $this->reset_inputs();
        return Session::flash('email_user', 'PLEASE CHECK YOUR E-MAIL TO ACTIVATE YOUR NEW EMAIL.');
    }

    public function update_password()
    {
        $this->validate([
            'password' => 'required|string|min:6|max:16',
            're_type_password' => 'required|same:password|string|min:6|max:16',
        ]);
        User::findorfail(Auth::guard('user')->user()->id)->update([
            'password' => Hash::make($this->password),
            'by' => Auth::guard('user')->user()->email,
        ]);
        $this->reset_inputs();
        return Session::flash('password_user', 'Your password updated successfully.');
    }

    public function update_birthdate()
    {
        $this->validate([
            'birthdate' => 'required|date'
        ]);
        User::findorfail(Auth::guard('user')->user()->id)->update([
            'birthdate' => $this->birthdate,
            'by' => Auth::guard('user')->user()->email,
        ]);
        return Session::flash('birthdate_user', 'Your birthdate updated successfully.');
    }

    public function update_phone()
    {
        $this->validate([
            'phone' => 'required|unique:users,phone|numeric|digits:11|regex:/(01)[0-9]{9}/',
            're_type_phone' => 'required|same:phone|numeric|digits:11|unique:users,phone|regex:/(01)[0-9]{9}/',
        ]);
        User::findorfail(Auth::guard('user')->user()->id)->update([
            'phone' => $this->phone,
            'by' => Auth::guard('user')->user()->email,
        ]);
        $this->reset_inputs();
        return Session::flash('phone_admin', 'Your phone updated successfully.');
    }

    public function update_photo()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpg,png,gif',
        ]);
        $db_photo = User::findorfail(Auth::guard('user')->user()->id);
        unlink(public_path(Storage::url($db_photo->photo)));
        User::findorfail(Auth::guard('user')->user()->id)->update([
            'photo' => $this->photo->store('user/user-photo', 'public'),
            'by' => Auth::guard('user')->user()->email,
        ]);
        $this->reset_inputs();
        return Session::flash('photo_user', 'Your photo updated successfully.');
    }
}
