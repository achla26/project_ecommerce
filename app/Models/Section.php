<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon',
        'status'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
    	return $this->hasMany('App\Models\Category','section_id')->where(['parent_id'=>'ROOT','status'=>'active'])->with('subcategories');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
    	return $this->hasMany('App\Models\Product')->where(['status'=>'active']);
    }
}
