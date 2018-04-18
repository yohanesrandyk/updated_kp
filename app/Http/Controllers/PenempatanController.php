<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Siswa;
use App\Jurusan;
use App\Kaprog;
use App\Rayon;
use App\Perusahaan;
use App\BidangPerusahaan;

class siswaObj{
  public $id, $nis, $nama, $rayon, $jurusan, $rombel, $jk, $email, $telp, $alamat, $agama, $bop, $bod, $id_perusahaan, $status_perusahaan, $area;
}
class perusahaanObj{
  public $id_perusahaan, $perusahaan, $email, $telp, $kota, $jumlah_verified, $jumlah_pending, $area;
}
class PenempatanController extends Controller
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

     public function index(){
      if (Auth::user()->id_role==2) {
        $jurusan = Kaprog::where('id', Auth::user()->id)->first()->id_jurusan;
        $siswa_get = Siswa::where('id_jurusan', $jurusan)->get();
      }else{
        $siswa_get = Siswa::all();
      }
        $siswa = [];
        $x = 0;
        foreach ($siswa_get as $data) {
          $obj = new siswaObj();
          $user = User::where("id", $data->id)->first();
          if($user->status==3 || $user->status==5 || $user->status==4){
            $obj->nis = $data->nis;
            $obj->nama = $user->nama;
            $obj->rayon = Rayon::where('id_rayon', $data->id_rayon)->first()->rayon;

            if ($data->id_perusahaan > 0) {
              $obj->perusahaan = Perusahaan::where('id_perusahaan', $data->id_perusahaan)->first()->perusahaan;
            }else{
              $obj->perusahaan = "-";
            }

            if (is_null($data->status_perusahaan)) {
              $obj->status_perusahaan = "-";
            }elseif ($data->status_perusahaan == 1) {
              $obj->status_perusahaan = "Terverifikasi";
            }elseif($data->status_perusahaan == 0){
              $obj->status_perusahaan = "Pending";
            }
            if($data->id_area == 0) {
              $obj->area = "Belum Memilih";
            }elseif ($data->id_area == 1) {
              $obj->area = "Bogor";
            }elseif ($data->id_area == 2) {
              $obj->area = "Jabodetabek";
            }elseif ($data->id_area == 3) {
              $obj->area = "Luar Jabodetabek";
            }  
            $siswa[$x] = $obj;
            $x++;
          }
        }
        $perusahaan_get = Perusahaan::where('status','1')->get();
        $perusahaan = [];$x = 0;
        foreach ($perusahaan_get as $data) {
          $obj = new perusahaanObj();
          $obj->id_perusahaan = $data->id_perusahaan;
          $obj->perusahaan = $data->perusahaan;
          $obj->email = $data->email;
          $obj->telp = $data->telp;
          if ($data->id_area == 1) {
            $obj->area = "Bogor";
          }elseif ($data->id_area == 2) {
            $obj->area = "Jabodetabek";
          }elseif ($data->id_area == 3) {
            $obj->area = "Luar Jabodetabek";
          }
          $obj->jumlah_verified = Siswa::where([['id_perusahaan', $data->id_perusahaan],['status_perusahaan', '1']])->count();
          $obj->jumlah_pending = Siswa::where([['id_perusahaan', $data->id_perusahaan],['status_perusahaan', '0']])->count();
          $perusahaan[$x] = $obj;$x++;
        }
        return view("penempatan.index",["siswa"=>$siswa, "perusahaan"=>$perusahaan]);
    }

    public function create($id){
      $id = decrypt($id);
      $jurusan = Kaprog::where('id', Auth::user()->id)->first()->id_jurusan;
      $area = Perusahaan::where('id_perusahaan', $id)->first()->id_area;
      $siswa_get = Siswa::whereNull('id_perusahaan')->where([['id_area', $area], ['id_jurusan', $jurusan]])->get();$siswa_quo = [];$x = 1;
      foreach ($siswa_get as $data) {
        $obj = new siswaObj();
        $user = User::where("id", $data->id)->first();
        if($user->status==3 || $user->status==5){
          $obj->nis = $data->nis;
          $obj->rayon = Rayon::where('id_rayon', $data->id_rayon)->first()->rayon;
          $obj->nama = $user->nama;
          $obj->id = $data->id;
          $siswa_quo[$x] = $obj;
          $x++;
        }
      }
      $siswa_get = Siswa::where([['id_perusahaan', $id],['status_perusahaan', '0'],['id_jurusan', $jurusan]])->get();$siswa_tmp = [];$x = 1;
      foreach ($siswa_get as $data) {
        $obj = new siswaObj();
        $user = User::where("id", $data->id)->first();
        if($user->status==3 || $user->status==5){
          $obj->nis = $data->nis;
          $obj->nama = $user->nama;
          $obj->rayon = Rayon::where('id_rayon', $data->id_rayon)->first()->rayon;
          $obj->id = $data->id;
          $siswa_tmp[$x] = $obj;
          $x++;
        }
      }
      $thisperusahaan = Perusahaan::where('id_perusahaan',$id)->first();
      $bidang = BidangPerusahaan::where('id_bidang', $thisperusahaan->id_bidang)->first();
      return view("penempatan.add",["siswa_quo"=>$siswa_quo,"siswa_tmp"=>$siswa_tmp, "thisperusahaan"=>$thisperusahaan, "bidang"=>$bidang]);
    }

    public function store(Request $req){
      $siswa = explode(',', $req->siswa);
      for ($i=0; $i < count($siswa); $i++) {
        Siswa::where("id", $siswa[$i])->update([
          "id_perusahaan" => $req->perusahaan,
          "status_perusahaan" => $req->status
        ]);
        if ($req->status == 1) {
          User::where("id", $siswa[$i])->update([
            "status" => 5
          ]);
        }
      }
      return redirect('penempatan/add/'.$req->redirect);
    }
}
