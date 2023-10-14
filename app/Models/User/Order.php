<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','item_id','item_price','item_quantity','country','first_name','last_name','address','city','postcode','email','phone','notes','status','by'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
