<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'item_id', 'by'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
