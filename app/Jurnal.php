<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    //

    protected $table="jurnal";
    public $timestamps = false;
    protected $fillable=["id","divisi","mulai","selesai","bentuk_kegiatan","hasil_pencapaian","keterangan", "paraf"];
}
