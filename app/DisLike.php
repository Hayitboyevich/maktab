<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisLike extends Model
{
   protected $table = 'dislikes';
   protected $fillable =['user_id', 'post_id', 'email'];
}
