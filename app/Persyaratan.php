<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    Protected $table = "persyaratan";
    protected $fillable=["nis", "bantara", "nilai", "keuangan", "kesiswaan", "cbt_prod", "kehadiran_pengayaan_pkl", "lulus_ujikelayakan", "perpustakaan", "surat_persyaratan"];
}
