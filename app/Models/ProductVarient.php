<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'attribute_set_names',
        'attribute_names',
    ];

    public function getAttributeSetIdsAttribute()
    {
        return  json_decode(@$this->attributes['attribute_set_ids']); 
    }

    public function getAttributeIdsAttribute()
    {
        return  json_decode(@$this->attributes['attribute_ids']); 
    }

    public function getAttributeSetNamesAttribute()
    {
        $ids = json_decode(@$this->attributes['attribute_set_ids']);
 
        return collect(AttributeSet::query()
            ->select('name')
            ->whereIn('id', is_array($ids) ? $ids :explode(",", $ids))
            ->get())->pluck('name')->toArray();
    }

    public function getAttributeNamesAttribute()
    {
        $ids = json_decode(@$this->attributes['attribute_ids']);

        return collect(Attribute::query()
            ->select('name')
            ->whereIn('id', is_array($ids) ? $ids :explode(",", $ids))
            ->get())->pluck('name')->toArray();
    }
}
