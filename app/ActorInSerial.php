<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorInSerial extends Model
{
    protected $fillable = [
    	"serial_id", "actor_id"
    ];
}
