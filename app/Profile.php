<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected  $table = 'profiles';
    protected $fillable = ['user_id', 'name', 'designation', 'profile_pic'];
}
