<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Jurnal;

// class siswaObj{
//   public $nis, $nama, $rayon, $jurusan, $rombel, $jk, $email, $telp, $alamat, $agama, $bop, $bod;
// }

class JurnalController extends Controller
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
        $jurnal = Jurnal::where("id", Auth::user()->id)->get();
        $today = count(Jurnal::where([['created_at', 'like' , '%'.date("Y-m-d").'%'],['id', Auth::user()->id]])->get());
        return view("jurnal.index", ["jurnal" => $jurnal, "today" => $today]);
    }
    public function create(){
      $today = count(Jurnal::where([['created_at', 'like' , '%'.date("Y-m-d").'%'],['id', Auth::user()->id]])->get());
      if ($today > 0) {
        return redirect('jurnal');
      }else{
        return view("jurnal.add");
      }
    }
    public function store(Request $req){
      Jurnal::create([
        "id" => Auth::user()->id,
        "divisi" => $req->divisi,
        "mulai" => $req->mulai,
        "selesai" => $req->selesai,
        "bentuk_kegiatan" => $req->bentuk_kegiatan,
        "hasil_pencapaian" => $req->hasil_pencapaian,
        "ket" => $req->ket,
      ]);
      return redirect("jurnal");
    }
    public function print(){
      $jurnal = Jurnal::where("id", Auth::user()->id)->get();
      return view("jurnal.print", compact("jurnal"));
    }

    // public function edit($id){
    //   $user = User::where("id", $id)->first();
    //   return view("user.edit", compact("user"));
    // }
    // public function update(Request $req, $id){
    //   User::where("id", $id)->update([
    //     "nama" => $req->nama,
    //     "telp" => $req->telp,
    //     "bod" => $req->bod,
    //     "bop" => $req->bop,
    //     "alamat" => $req->alamat
    //   ]);
    //   return redirect("user");
    // }
    // public function destroy($id){
    //   User::where("id", $id)->delete();
    //   return redirect("user");
    // }
}
