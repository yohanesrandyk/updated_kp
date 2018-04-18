<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Siswa;
use App\Rayon;
use App\Jurusan;
use App\Rombel;
use App\Persyaratan;
use App\Kaprog;
use App\Pembimbing;
use App\Jurnal;
use App\Kehadiran;

class siswaObj{
  public $nis, $nama, $rayon, $jurusan, $rombel, $jk, $email, $telp, $alamat, $agama, $bop, $bod, $id;
}

class SiswaController extends Controller
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
          $get_siswa = Siswa::where('id_jurusan', $jurusan)->get();
        }else if (Auth::user()->id_role==4) {
          $rayon = Pembimbing::where('id', Auth::user()->id)->first()->id_rayon;
          $get_siswa = Siswa::where('id_rayon', $rayon)->get();
        }else{
          $get_siswa = Siswa::all();
        }
        $siswa = [];
        $x = 1;
        foreach ($get_siswa as $data) {
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
           $obj->id = $data->id;
           $siswa[$x] = $obj;
           $x++;
        }
        return view("siswa.index",compact("siswa"));
    }
    public function create(){
      $rayon = Rayon::all();
      $jurusan = Jurusan::all();
      $rombel = Rombel::all();
      return view("siswa.add", compact("rayon", "jurusan", "rombel"));
    }
    public function store(Request $req){
      $this->validate($req, [
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'nis' => 'required|min:8|max:8|unique:siswa',
        'telp' => 'required|max:14'
      ]);
      User::create([
        "id_role" => "3",
        "username" => $req->username,
        "password" => bcrypt($req->password),
        "nama" => $req->nama,
        "email" => $req->email,
        "telp" => $req->telp,
        "bod" => $req->bod,
        "bop" => $req->bop,
        "alamat" => $req->alamat,
        "status" => 1,
        //status 1 = siswa_created
        //status 2 = siswa_kota_select,
        //status 3 = siswa_wait_to select,
      ]);
      $last_user = User::orderBy("created_at", "desc")->first();
      Siswa::create([
        "nis" => $req->nis,
        "id" => $last_user->id,
        "id_rayon" => $req->rayon,
        "id_jurusan" => $req->jurusan,
        "id_rombel" => $req->rombel,
        "agama" => $req->agama,
        "jk" => $req->jk,
        "id_area" => 0
      ]);
      Persyaratan::create([
        "nis" => $req->nis
      ]);
      return redirect("siswa");
    }
    public function edit($id){
      $id = decrypt($id);
      $siswa = new siswaObj();
      $data_siswa = Siswa::where("id", $id)->first();
      $data_user = User::where("id", $id)->first();
      $siswa->nama = $data_user->nama;
      $siswa->rayon = $data_siswa->id_rayon;
      $siswa->jurusan = $data_siswa->id_jurusan;
      $siswa->rombel = $data_siswa->id_rombel;
      $siswa->jk = $data_siswa->jk;
      $siswa->agama = $data_siswa->agama;
      $siswa->bop = $data_user->bop;
      $siswa->bod = $data_user->bod;
      $siswa->email = $data_user->email;
      $siswa->telp = $data_user->telp;
      $siswa->alamat = $data_user->alamat;
      return view("siswa.edit", compact("siswa"));
    }
    public function update(Request $req, $id){
      $id = decrypt($id);
      User::where("id", $id)->update([
        "nama" => $req->nama,
        "telp" => $req->telp,
        "bod" => $req->bod,
        "bop" => $req->bop,
        "alamat" => $req->alamat
      ]);
      Siswa::where("id", $id)->update([
        "agama" => $req->agama,
        "jk" => $req->jk
      ]);
      return redirect("siswa");
    }
    public function destroy($id){
      $id = decrypt($id);
      Jurnal::where("id", $id)->delete();
      Kehadiran::where("id", $id)->delete();
      Persyaratan::where("nis", Siswa::where("id", $id)->first()->nis)->delete();
      Siswa::where("id", $id)->delete();
      User::where("id", $id)->delete();
      return redirect("siswa");
    }
}
