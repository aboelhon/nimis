<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;
use App\Models\User\ActiveUserEmail;
use Illuminate\Support\Facades\Auth;

class Active extends Component
{
    public $code;
    public $email;
    public function render()
    {
        return view('livewire.user.active');
    }
    public function active()
    {
        $this->validate([
            'code' => 'required|integer|exists:active_user_emails,active_code',
            'email' => 'required|email|exists:active_user_emails,user_email'
        ]);
        DB::table('active_user_emails')
            ->where('active_code', $this->code)
            ->where('user_email', $this->email)->first();
        User::findorfail(Auth::guard('user')->user()->id)->update([
            'status' => 'active'
        ]);
        ActiveUserEmail::where('id', Auth::guard('user')->user()->id)->delete();
        return redirect(route('user.login'));
    }
    public function update_email()
    {
        $active =  DB::table('active_user_emails')
            ->where('active_code', $this->code)
            ->where('user_email', $this->email)->first();
        ActiveUserEmail::where('user_email', $active->user_email)
            ->delete();
        User::findorfail(Auth::guard('user')->user()->id)
            ->update([
                'status' => 'active'
            ]);
        return redirect(route('user.login'));
    }
}
