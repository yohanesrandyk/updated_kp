<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Rayon;
use App\Jurusan;
use App\Pembimbing;
use App\Kaprog;

// class siswaObj{
//   public $nis, $nama, $rayon, $jurusan, $rombel, $jk, $email, $telp, $alamat, $agama, $bop, $bod;
// }

class UserController extends Controller
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
        $user = User::where("id_role", "<>", 3)->get();
        $role = Role::all();
        return view("user.index",compact("user", "role"));
    }
    public function create(){
      $role = Role::all();
      $jurusan = Jurusan::all();
      $rayon = Rayon::all();
      return view("user.add", compact("role", "jurusan", "rayon"));
    }
    public function store(Request $req){
      $this->validate($req, [
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'telp' => 'required|max:14'
      ]);
      if ($req->role!=3) {
        $status = 0;
      }
      User::create([
        "id_role" => $req->role,
        "username" => $req->username,
        "password" => bcrypt($req->password),
        "nama" => $req->nama,
        "email" => $req->email,
        "telp" => $req->telp,
        "bod" => $req->bod,
        "bop" => $req->bop,
        "alamat" => $req->alamat,
        "status" => $status
      ]);
      $id = User::orderBy("created_at", "desc")->first()->id;
      if ($req->role==2) {
        Kaprog::create([
          "id" => $id,
          "id_jurusan" => $req->jurusan
        ]);
      }else if($req->role==4){
        Pembimbing::create([
          "id" => $id,
          "id_rayon" => $req->rayon
        ]);
      };
      return redirect("user");
    }
    public function edit($id){
      $id = decrypt($id);
      $user = User::where("id", $id)->first();
      return view("user.edit", compact("user"));
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
      return redirect("user");
    }
    public function destroy($id){
      $id = decrypt($id);
      if (User::where("id", $id)->first()->id_role==2) {
        Kaprog::where("id", $id)->delete();
      }else if (User::where("id", $id)->first()->id_role==4) {
        Pembimbing::where("id", $id)->delete();
      }
      User::where("id", $id)->delete();
      return redirect("user");
    }
}
