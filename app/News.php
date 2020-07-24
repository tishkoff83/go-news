<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'body', 'image', 'slug', 'link', 'url', 'category_id', 'view', 'origin_link', 'status', 'note'];


}
