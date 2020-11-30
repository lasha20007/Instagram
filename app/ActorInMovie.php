<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorInMovie extends Model
{
    protected $fillable = [
    	"movie_id", "actor_id"
    ];
}
