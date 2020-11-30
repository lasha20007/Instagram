<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SerialGenre extends Model
{
    protected $fillable = [
    	"serial_id", "genre_id"
    ];
}
