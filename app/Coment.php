<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $fillable = [
    	'user_id', 
    	'user_nickname', 
    	'movie_id', 
    	'serial_id', 
    	'comment'
    ];
}
