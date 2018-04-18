<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Persyaratan;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Jurusan;
use App\Rombel;
use App\Pembimbing;
use App\Kaprog;

class siswaObj{
  public $nis, $nama, $rayon, $jurusan, $bantara, $nilai, $keuangan, $kesiswaaan, $cbt_prod, $kehadiran_pengayaan, $ujikom, $perpus;
}
class syaratObj{
  public $no, $status;
}

class PersyaratanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //ongoing
    public function index2($id){
        $id = decrypt($id);
        $res = Persyaratan::where("nis", $id)->first();
        $siswa = Siswa::where("nis", $id)->first();
        $user = User::where("id", $siswa->id)->first();
        $rayon = Rayon::where("id_rayon", $siswa->id_rayon)->first();
        $rombel = Rombel::where("id_rombel", $siswa->id_rombel)->first();
        $jurusan = Jurusan::where("id_jurusan", $siswa->id_jurusan)->first();
        return view("persyaratan.index2", ["res"=>$res, "siswa"=>$siswa, "user"=>$user, "rayon"=>$rayon, "rombel"=>$rombel, "jurusan"=>$jurusan]);
    }
     public function index(){
        if(Auth::user()->id_role==4){
            $id_rayon = Pembimbing::where("id", Auth::user()->id)->first()->id_rayon;
            $get_siswa = Siswa::where("id_rayon", $id_rayon)->get();
        }elseif(Auth::user()->id_role==2){
            $id_jurusan = Kaprog::where("id", Auth::user()->id)->first()->id_jurusan;
            $get_siswa = Siswa::where("id_jurusan", $id_jurusan)->get();
        }else{
            $get_siswa = Siswa::all();
        }
      $siswa = [];
      $x = 1;
      foreach ($get_siswa as $data) {
         $obj = new siswaObj();
         $user = User::where("id", $data->id)->first();
         $syarat = Persyaratan::where("nis", $data->nis)->first();
         $obj->nis = $data->nis;
         $obj->nama = $user->nama;
         $obj->rayon = Rayon::where("id_rayon", $data->id_rayon)->first()->rayon;
         $obj->jurusan = Jurusan::where("id_jurusan", $data->id_jurusan)->first()->jurusan;
         $obj->bantara = $syarat->bantara;
         $obj->nilai = $syarat->nilai;
         $obj->keuangan = $syarat->keuangan;
         $obj->kesiswaan = $syarat->kesiswaan;
         $obj->cbt_prod = $syarat->cbt_prod;
         $obj->kehadiran_pengayaan = $syarat->kehadiran_pengayaan_pkl;
         $obj->ujikel = $syarat->lulus_ujikelayakan;
         $obj->perpus = $syarat->perpustakaan;
         $siswa[$x] = $obj;
         $x++;
      }
      return view("persyaratan.index",compact("siswa"));
    }
    public function store(Request $req){
        $field = $req->field;
        $cek = Persyaratan::where("nis", $req->nis)->first()->$field;
        if ($cek > 0) {
            Persyaratan::where("nis", $req->nis)->update([
                $field => 0
            ]);
            $siswa = Siswa::where("nis", $req->nis)->first();
            if ($siswa->id_area < 1) {
                User::where('id', $siswa->id)->update(["status" => 1]);   
            }else{
                User::where('id', $siswa->id)->update(["status" => 2]);
            }
        }else{
            Persyaratan::where("nis", $req->nis)->update([
                $field => 1
            ]);
        }
        $persyaratan = Persyaratan::where([
            ["nis", $req->nis],
            ["nilai", 1],
            ["bantara", 1],
            ["keuangan", 1],
            ["kesiswaan", 1],
            ["cbt_prod", 1],
            ["kehadiran_pengayaan_pkl", 1],
            ["lulus_ujikelayakan", 1],
            ["perpustakaan", 1],
        ])->first();
        if (count($persyaratan) > 0) {
            $id = Siswa::where("nis", $req->nis)->first()->id; 
            $status = User::where('id', $id)->first()->status;
            if ($status == 1) {
                User::where('id', $id)->update([
                    "status" => 4
                ]);
            }else if ($status == 2) {
                User::where('id', $id)->update([
                    "status" => 3
                ]);
            }
        };
      return redirect('persyaratan');
    }
}
