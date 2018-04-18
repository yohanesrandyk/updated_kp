<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    //

    protected $table="session";
    protected $fillable=["id","nama_sesi","isi","status"];
}
