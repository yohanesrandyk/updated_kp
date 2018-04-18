<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    Protected $table = "rayon";
    protected $fillable=["rayon"];
    public $timestamps = false;
}
