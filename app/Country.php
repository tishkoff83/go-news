<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['id', 'iso'];

    public function goods()
    {
        return $this->belongsToMany(Goods::class, 'country_goods', 'goods_id', 'country_id', 'id', 'id');
    }

    public function scopeWithGoods($query, $goodsId)
    {
        $query->whereHas('goods', function ($q) use ($goodsId) {
            $q->where('goods_id', $goodsId);
        });
    }


    public function setContactIdAttribute($goodsId)
    {
        $this->save();
        $contact = Goods::find($goodsId);
        $this->contacts()->attach($contact);
    }


}
