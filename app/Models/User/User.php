<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $fillable = ['name', 'email', 'password', 'birthdate', 'address', 'phone', 'photo', 'role', 'by', 'status'];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
