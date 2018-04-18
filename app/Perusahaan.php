<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    //

    protected $table="perusahaan";
    protected $primaryKey="id_perusahaan";
    protected $fillable=["id_bidang","perusahaan","kota","alamat","kode_pos","telp","website","email","status", "id_area"];

    public function getBidang(){
      return $this->belongsTo('App\BidangPerusahaan','id_bidang','id_bidang');
    }
}
