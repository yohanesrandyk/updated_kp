<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    Protected $table = "siswa";
    public $timestamps = false;
    protected $fillable=["nis","id","id_rayon","id_jurusan","id_rombel", "agama", "jk", "id_perusahaan", "status_perusahaan", "id_area"];
}
