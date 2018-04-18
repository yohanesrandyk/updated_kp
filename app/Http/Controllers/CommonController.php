<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Kehadiran;
use App\Sesi;
use Session;

class CommonController extends Controller
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
    public function status_absen()
    {
      // $absen_last = Kehadiran::orderBy('')->get();
      $status = Kehadiran::where('created_at', 'like', '%'.date("Y-m-d").'%')->get();
      if(count($status) < 1){
        $absen_sesi = Sesi::where("nama_sesi", "absen")->first();
        if (count($absen_sesi) < 1) {
          Sesi::create([
            "id" => Auth::user()->id,
            "nama_sesi" => "absen",
            "isi" => "1",
            "status" => "0",
          ]);
        }
      }
      return redirect(Session::get('route_last'));
    }
}
