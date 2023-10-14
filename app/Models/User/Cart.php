<?php

namespace App\Models\User;

use App\Models\Admin\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'item_id', 'card_item_quantity','orderd'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function cart()
    {
        return $this->belongsTo(User::class);
    }
}
