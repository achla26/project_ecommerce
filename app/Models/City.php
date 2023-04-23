<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function country(){
    	return $this->belongsTo('App\Models\Country','country_id')->select('id','name');
    }

    public function state(){
    	return $this->belongsTo('App\Models\State','state_id')->select('id','name');
    }
}
