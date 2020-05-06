<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
   protected $fillable = ['title', 'image', 'slug', 'url', 'category_id', 'view', 'status', 'note'];
}
