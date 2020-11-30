<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
    	"name_geo",
    	"name_eng",
    	"birth_date",
    	"birth_place",
    	"actor_img"
    ];
}
