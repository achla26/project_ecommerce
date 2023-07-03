<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'ip',
        'product_varient_id',
        'qty',
    ];
    protected $appends= [
        'single_item_total',
    ];
    public function product(){
    	return $this->belongsTo('App\Models\Product');
    }

    public function varients(){
    	return $this->hasMany('App\Models\ProductVarient');
    }

    public function getSingleItemTotalAttribute()
    {
        return price($this->qty * js_product($this->product->id)['unit_price']);
    }
}
