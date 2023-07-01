<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;
use Illuminate\Support\Str;
class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setSlugAttribute(){
        $this->attributes['slug'] = Str::slug($this->name );
    }
    
    public function category(){
    	return $this->belongsTo('App\Models\Category','category_id');
    }
    public function subcategory(){
    	return $this->belongsTo('App\Models\Category','parent_id');
    }

    public function section(){
    	return $this->belongsTo('App\Models\Section','section_id');
    }

    public function varients(){
    	return $this->hasMany('App\Models\ProductVarient');
    }

    public function images(){
    	return $this->hasMany('App\Models\productImage');
    }

    public function discount(){
    	return $this->hasOne('App\Models\ProductDiscount');
    }

    public static function fetchAttribute($id)
    {
        $attribute =  Attribute::find($id);
        return $get_attribute[$attribute->attribute_set->name]= $attribute->name;
    }

}
