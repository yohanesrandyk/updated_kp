<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Perusahaan;
use App\Surat;
use App\User;
use App\Jurusan;
class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Surat::where('id_typesurat','3')->get();
        return  view('surat.surattugas.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $perusahaan = Perusahaan::Where('status','1')->orderBy('perusahaan')->get();
        $user = User::Where('id_role','!=','3')->orderBy('nama')->get();
        return view('surat.surattugas.add',compact('perusahaan','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $surat = Surat::where('nomersurat',$request->no_surat)->first();
        if ($surat > 0) {
            Session::flash('message', 'Data Tidak Dapat Disimpan Karena Data Sudah Ada !!!');
            Session::flash('alert-class', 'alert-danger');
            return redirect(url('/surattugas'));
        }
        $datasurat = Surat::where('id_perusahaan',$request->perusahaan)
                            ->where('created_at','like',''.date('Y').'%')
                            ->where('id_typesurat',3)
                            ->count();
        if ($datasurat <> 0 ) {
          Session::flash('message', 'Data Tidak Dapat Disimpan Karena Data Sudah Ada !!!');
          Session::flash('alert-class', 'alert-danger');
          return redirect(url('/suratpermohonan'));
        }else{
          $data = new Surat;
          $data->id_typesurat='3';
          $data->id_perusahaan=$request->perusahaan;
          $data->nomersurat=$request->no_surat;
          $data->tgl_keluar=$request->tanggalkeluar;
          $data->isi=$request->namapemb.";".$request->ajaran.";".$request->ks;
          $data->save();
          Session::flash('message', 'Data Berhasil Disimpan');
          Session::flash('alert-class', 'alert-success');
          return redirect(url('/surattugas'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $r = Surat::find(decrypt($id));
        $exp = explode(';', $r->isi);
        $pemb = User::find($exp[0]);
        $bulan = new Surat;
        $tglkeluar=explode('/', $r->tgl_keluar);
        $namabulan = $bulan->getBulan($tglkeluar[1]);
        $romawi = $bulan->getromawi($tglkeluar[1]);
        return view('surat.surattugas.print',compact('r','namabulan','romawi','jurusan','pemb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $r =  Surat::find(decrypt($id));
        $perusahaan = Perusahaan::Where('status','1')->orderBy('perusahaan')->get();
        $user = User::Where('id_role','>','1')->orderBy('nama')->get();
        return view('surat.surattugas.edit',compact('r','perusahaan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data =  Surat::find(decrypt($id));;
        $data->id_perusahaan=$request->input('perusahaan');
        $data->tgl_keluar=$request->input('tanggalkeluar');
        $data->isi= $request->input('namapemb').";".
                    $request->input('ajaran').";".
                    $request->input('ks');

        $data->update();
        Session::flash('message', 'Data Berhasil Diupdate');
        Session::flash('alert-class', 'alert-info');
        return redirect(url('/surattugas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data =  Surat::find(decrypt($id));;
        $data->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        Session::flash('alert-class', 'alert-danger');
        return redirect(url('/surattugas'));
    }
}
