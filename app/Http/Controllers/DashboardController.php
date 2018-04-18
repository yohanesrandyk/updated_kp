<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Siswa;
use App\User;
use App\Perusahaan;
use App\Rayon;
use App\Rombel;
use App\Jurusan;
use App\BidangPerusahaan;
use App\Persyaratan;
use App\Kaprog;
use App\Pembimbing;
use App\Surat;

// class siswaObj{
//   public $id, $nis, $nama, $rayon, $jurusan, $rombel, $jk, $email, $telp, $alamat, $agama, $bop, $bod, $id_perusahaan, $status_perusahaan, $area;
// }

class DashboardController extends Controller
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
      if (Auth::user()->status==0) {
        if (Auth::user()->id_role == 2) {
          $siswa = count(Siswa::where("id_jurusan", Kaprog::where("id", Auth::user()->id)->first()->id_jurusan)->get());
        }else if (Auth::user()->id_role == 4) {
          $siswa = count(Siswa::where("id_rayon", Pembimbing::where("id", Auth::user()->id)->first()->id_rayon)->get());
        }else{
          $siswa = count(Siswa::all());
        }
        $perusahaan = count(Perusahaan::all());
        $bidangperusahaan = count(BidangPerusahaan::all());
        $jurusan = count(Jurusan::all());
        $rayon = count(Rayon::all());
        $rombel = count(Rombel::all());
        $perusahaan_p = Perusahaan::all();
        if (Auth::user()->id_role == 2) {
          $siswa_get = Siswa::where("id_jurusan", Kaprog::where("id", Auth::user()->id)->first()->id_jurusan)->get();
          $selesai = 0;
          foreach ($siswa_get as $data) {
            $cek = count(Persyaratan::where([
              ["nis", $data->nis],
              ["nilai", 1],
              ["bantara", 1],
              ["keuangan", 1],
              ["kesiswaan", 1],
              ["cbt_prod", 1],
              ["kehadiran_pengayaan_pkl", 1],
              ["lulus_ujikelayakan", 1],
              ["perpustakaan", 1],
            ])->first());
            if ($cek>0) {
              $selesai++;
            }
          }
        }else if (Auth::user()->id_role == 4) {
          $siswa_get = Siswa::where("id_rayon", Pembimbing::where("id", Auth::user()->id)->first()->id_rayon)->get();
          $selesai = 0;
          foreach ($siswa_get as $data) {
            $cek = count(Persyaratan::where([
              ["nis", $data->nis],
              ["nilai", 1],
              ["bantara", 1],
              ["keuangan", 1],
              ["kesiswaan", 1],
              ["cbt_prod", 1],
              ["kehadiran_pengayaan_pkl", 1],
              ["lulus_ujikelayakan", 1],
              ["perpustakaan", 1],
            ])->first());
            if ($cek>0) {
              $selesai++;
            }
          }
        }else if(Auth::user()->id_role == 5){
          $selesai = count(Persyaratan::where([
            ["bantara", 1]
        ])->get());
        }else if(Auth::user()->id_role == 6){
          $selesai = count(Persyaratan::where([
            ["perpustakaan", 1]
        ])->get());
        }else if(Auth::user()->id_role == 7){
          $selesai = count(Persyaratan::where([
            ["kesiswaan", 1]
        ])->get());
        }else if(Auth::user()->id_role == 8){
          $selesai = count(Persyaratan::where([
            ["keuangan", 1]
        ])->get());
        }else if (Auth::user()->id_role == 9) {
          $siswa_get = Siswa::all();
          $selesai = 0;
          foreach ($siswa_get as $data) {
            $cek = count(Persyaratan::where([
              ["nis", $data->nis],
              ["nilai", 1],
              ["bantara", 1],
              ["keuangan", 1],
              ["kesiswaan", 1],
              ["cbt_prod", 1],
              ["kehadiran_pengayaan_pkl", 1],
              ["lulus_ujikelayakan", 1],
              ["perpustakaan", 1],
            ])->first());
            if ($cek>0) {
              $selesai++;
            }
          }
        }
        if (Auth::user()->id_role!=1) {
          $belum_selesai = $siswa-$selesai;
        }
        return view("dashboard.status0", compact("siswa", "perusahaan", "bidangperusahaan", "jurusan", "rayon", "rombel", "perusahaan_p", "selesai", "belum_selesai"));
      }
      else if (Auth::user()->status==1 || Auth::user()->status==4) {
        return view("dashboard.status1or4");
      }
      if(Auth::user()->status==2){
        return (new PersyaratanController)->index2(encrypt(Siswa::where("id", Auth::user()->id)->first()->nis));
      }else if (Auth::user()->status==3) {
        $siswa = Siswa::where("id", Auth::user()->id)->first();
        $rayon = Rayon::where("id_rayon", $siswa->id_rayon)->first();
        $rombel = Rombel::where("id_rombel", $siswa->id_rombel)->first();
        $jurusan = Jurusan::where("id_jurusan", $siswa->id_jurusan)->first();
        return view("dashboard.status3", compact("siswa", "rayon", "rombel", "jurusan"));
      }else if (Auth::user()->status==5) {
        $id = Auth::user()->id;
        $siswa = Siswa::where("id", $id)->first();

        $rayon = Rayon::where("id_rayon", $siswa->id_rayon)->first();
        $rombel = Rombel::where("id_rombel", $siswa->id_rombel)->first();
        $jurusan = Jurusan::where("id_jurusan", $siswa->id_jurusan)->first();
        
        $id_perusahaan = $siswa->id_perusahaan;

        $student_year = Auth::user()->created_at;
        
        $surat_get = Surat::where([["id_typesurat", 4], ["id_perusahaan", $id_perusahaan], ['created_at', 'like' , '%'.$student_year->format("Y").'%']])->first();
        $surat_arr = explode(';', $surat_get->isi);

        $mulai = $surat_arr[0];
        $selesai = $surat_arr[1];

        $days = intval(abs(strtotime($surat_arr[0]) - strtotime($surat_arr[1]))/86400);
        
        $days_left = intval(abs(strtotime(date("Y/m/d")) - strtotime($surat_arr[1]))/86400);

        $precentage = round($days_left/$days * 100);


        $rekan_get = Siswa::where([["id_perusahaan", $id_perusahaan], ["id", "<>", $id]])->get();
        $perusahaan = Perusahaan::where("id_perusahaan", $id_perusahaan)->first();
        $rekan = [];
        $x = 0;
        foreach ($rekan_get as $data) {
          $obj = new siswaObj();
          $user = User::where("id", $data->id)->first();
          $obj->nis = $data->nis;
           $obj->nama = $user->nama;
           $obj->rayon = Rayon::where("id_rayon", $data->id_rayon)->first()->rayon;
           $obj->jurusan = Jurusan::where("id_jurusan", $data->id_jurusan)->first()->jurusan;
           $obj->rombel = Rombel::where("id_rombel", $data->id_rombel)->first()->rombel;
           $obj->jk = $data->jk;
           $obj->email = $user->email;
           $obj->telp = $user->telp;
           $obj->alamat = $user->alamat;
          $rekan[$x] = $obj;
          $x++;
        }
        return view("dashboard.status5", compact("siswa", "perusahaan", "rekan", "rombel", "rayon", "jurusan", "mulai", "selesai", "days", "precentage"));
      }
    }

    public function set_area(Request $req){
      Siswa::where("id", Auth::user()->id)->update([
        "id_area" => $req->area
      ]);
      if (Auth::user()->status == 4) {
        User::where("id", Auth::user()->id)->update([
          "status" => 3
        ]);
      }else if (Auth::user()->status == 1){
        User::where("id", Auth::user()->id)->update([
          "status" => 2
        ]);
      }
      return redirect('home');
    }
}
