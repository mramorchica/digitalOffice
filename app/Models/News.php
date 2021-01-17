<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   protected $fillable = [
    'title',
    'content',
    'image',
    'author_id',
    'date_published',
    'is_public',
    'category_id'
   ];

   public function category()
   {
      return $this->belongsTo('App\Models\NewsCategory');
   }
}
