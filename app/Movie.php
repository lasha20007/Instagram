<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
    	"title_geo",
    	"title_eng",
    	"imdb",
    	"release_date",
        "movie_img",
    	"directed_by",
    	"duration",
    	"country",
    	"description"
    ];
}
