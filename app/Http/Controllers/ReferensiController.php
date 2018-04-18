<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rayon;
use App\Rombel;
use App\Jurusan;

class ReferensiController extends Controller
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
        $rayon = Rayon::all();
        $rombel = Rombel::all();
        $jurusan = Jurusan::all();
        return view("referensi.index",compact("rayon", "rombel", "jurusan"));
    }
    public function create_rayon(){
      return view("rayon.add");
    }
    public function create_rombel(){
      return view("rombel.add");
    }
    public function create_jurusan(){
      return view("jurusan.add");
    }
    public function store_rayon(Request $req){
      Rayon::create([
        "rayon" => $req->rayon
      ]);
      return redirect("referensi");
    }
    public function store_rombel(Request $req){
      Rombel::create([
        "rombel" => $req->rombel
      ]);
      return redirect("referensi");
    }
    public function store_jurusan(Request $req){
      Jurusan::create([
        "jurusan" => $req->jurusan
      ]);
      return redirect("referensi");
    }
}
