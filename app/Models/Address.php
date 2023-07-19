<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [ ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function country(){
    	return $this->belongsTo('App\Models\Country','country_id')->select('id','name');
    }

    public function state(){
    	return $this->belongsTo('App\Models\State','state_id')->select('id','name');
    }

    public function city(){
    	return $this->belongsTo('App\Models\City','city_id')->select('id','name');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','user_id');
    }
    const ADDRESS_TYPES = ['home' , 'office' , 'other'];
}
