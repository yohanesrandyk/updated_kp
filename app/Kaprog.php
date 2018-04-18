<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kaprog extends Model
{
    Protected $table = "kaprog";
    public $timestamps = false;
    protected $fillable=["id","id_jurusan"];
}
