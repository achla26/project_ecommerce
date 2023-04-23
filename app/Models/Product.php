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
    protected $appends= [
        'varient_name',
    ];

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


    public function getVarientNameAttribute()
    {
        $get_product =  $attributes = [];
        
        foreach(collect($this->varients)->pluck('attribute_id')->toArray() as $varient){
                                    
            $attributes[] = json_decode($varient);
        }
        $attributes= array_unique(call_user_func_array('array_merge', $attributes));
       
        foreach($attributes as $attribute){
            $attribute =  Attribute::find($attribute);
            $get_product[$attribute->attribute_set->name][$attribute->id]= $attribute->name;
        }

        return $get_product;
    }

}
