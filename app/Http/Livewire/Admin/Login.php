<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.admin.login');
    }

    public function login()
    {
        $admin = Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password]);
        if ($admin) {
            return redirect(route('admin.index'));
        } else {
            return redirect(route('admin.login'))->with('login_failed', 'Sorry credentials are not correct !');
        }
    }
}
