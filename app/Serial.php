<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    protected $fillable = [
    	"title_geo",
    	"title_eng",
    	"imdb",
    	"release_date",
        "serial_img",
    	"directed_by",
    	"duration",
    	"country",
    	"description"
    ];
}
