<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'sections',
        'attribute_set_id',
        'name',
        'price',
        'price_type',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function attribute_set(){
    	return $this->belongsTo('App\Models\AttributeSet','attribute_set_id')->select('id','name');
    }
}
