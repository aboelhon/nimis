<?php

namespace App\Models\Admin;

use App\Models\Admin\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'by'];
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
