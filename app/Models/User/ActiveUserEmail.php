<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveUserEmail extends Model
{
    use HasFactory;
    protected $fillable = ['user_email','active_code'];
 
}
