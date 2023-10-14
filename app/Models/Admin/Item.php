<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'size',
        'slug', 'status', 'department', 'by'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
