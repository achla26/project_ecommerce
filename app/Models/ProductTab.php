<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTab extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setNameAttribute($input)
    {
        $this->attributes['slug'] = Str::slug($input); 
    }
}
