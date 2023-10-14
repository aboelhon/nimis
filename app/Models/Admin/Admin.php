<?php

namespace App\Models\Admin;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $fillable = ['name', 'username', 'email', 'password', 'birthdate', 'address', 'phone', 'photo', 'role', 'status', 'by'];
    protected function birthdate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date_format(date_create($value), 'd M Y')
        );
    }
}
