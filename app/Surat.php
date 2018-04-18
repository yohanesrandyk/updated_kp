<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    //
    protected $table="surat";
    protected $primaryKey="id_surat";
    protected $fillable=["id_typesurat","id_perusahaan","nomersurat","isi","tgl_keluar"];

    // public function getTypeSurat(){
    // 	return $this->belongsTo('App\type_surat','id_typesurat','id_typesurat');
    // }
    public function getPerusahaan(){
        return $this->belongsTo('App\Perusahaan','id_perusahaan','id_perusahaan');
    }

    public function getBulan($bln){
        $bulan = $bln;
            Switch ($bulan){
             case 1 :
             $bulan="Januari";$romawi="I";
             Break;
             case 2 : $bulan="Februari";$romawi="II";
             Break;
             case 3 : $bulan="Maret";$romawi="III";
             Break;
             case 4 : $bulan="April";$romawi="IV";
             Break;
             case 5 : $bulan="Mei";$romawi="V";
             Break;
             case 6 : $bulan="Juni";$romawi="VI";
             Break;
             case 7 : $bulan="Juli";$romawi="VI";
             Break;
             case 8 : $bulan="Agustus";
             Break;
             case 9 : $bulan="September";
             Break;
             case 10 : $bulan="Oktober";
             Break;
             case 11 : $bulan="November";
             Break;
             case 12 : $bulan="Desember";
             Break;
             }
        return $bulan;
    }

    public function getRomawi($bln){
        $romawi = $bln;
            Switch ($romawi){
             case 1 : $romawi="I";
             Break;
             case 2 : $romawi="II";
             Break;
             case 3 : $romawi="III";
             Break;
             case 4 : $romawi="IV";
             Break;
             case 5 : $romawi="V";
             Break;
             case 6 : $romawi="VI";
             Break;
             case 7 : $romawi="VII";
             Break;
             case 8 : $romawi="VIII";
             Break;
             case 9 : $romawi="IX";
             Break;
             case 10 : $romawi="X";
             Break;
             case 11 : $romawi="XI";
             Break;
             case 12 : $romawi="XII";
             Break;
             }
        return $romawi;
    }
}
