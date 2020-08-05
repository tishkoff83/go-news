<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = [
        'id',
        'title',
        'image',
        'slug',
        'url',
        'category_id',
        'view',
        'status',
        'note',
        'country'
    ];

    public function country()
    {
        return $this->belongsToMany(Country::class, 'country_goods', 'goods_id', 'country_id', 'id', 'id');
    }



}
