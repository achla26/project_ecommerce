<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon',
        'status',
        'parent_id',
        'section_id',
        'discount',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function subcategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
    	return $this->hasMany('App\Models\Category','parent_id')->where('status','active');
    }

    public function section(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    	return $this->belongsTo('App\Models\Section','section_id')->select('id','name');
    }

    public function parentcategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    	return $this->belongsTo('App\Models\Category','parent_id')->select('id','name');
    }
}
