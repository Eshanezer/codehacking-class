<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable=[
       'post_id',
       'author',
       'email',
       'body',
       'photo_id',
       'is_active',
   ];


   public function post(){
       return $this->belongsTo('App\Post');
   }


   public function photo(){
       return $this->belongsTo('App\Photo');
   }
}
