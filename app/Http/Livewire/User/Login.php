<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.user.login');
    }
    public function login()
    {
        $this->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|string|min:6'
        ]);
        $user = Auth::guard('user')->attempt([
            'email' => $this->email, 'password' => $this->password
        ]);
        if ($user) {
            return redirect(route('home'));
        } else {
            return Session::flash('login_failed', 'The email address or password is incorrect');
        }
    }
}
