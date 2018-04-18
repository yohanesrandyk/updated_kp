<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    Protected $table = "pemb_rayon";
    public $timestamps = false;
    protected $fillable=["id","id_rayon"];
}
