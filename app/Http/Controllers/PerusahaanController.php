<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use App\Perusahaan;
use App\BidangPerusahaan;
class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Perusahaan::OrderBy('status','asc')->get();
        return view('perusahaan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data_bidang = BidangPerusahaan::OrderBy('bidangperusahaan','asc')->get();
        return view('perusahaan.add',compact('data_bidang'));
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
        $data = new Perusahaan;

        $data->id_bidang = $request->id_bidang;
        $data->perusahaan = $request->namaperusahaan;
        $data->kota = $request->kota;
        $data->alamat = $request->alamat;
        $data->kode_pos = $request->kodepos;
        $data->telp = $request->telepon;
        $data->website = $request->website;
        $data->email = $request->email;
        $data->status = $request->status;
        $data->id_area = $request->status;
        $data->save();
        Session::flash('message', 'Data Berhasil Disimpan'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect(url('/perusahaan'));
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
        $id = decrypt($id);
        $data_bidang = BidangPerusahaan::OrderBy('bidangperusahaan','asc')->get();
        $r = Perusahaan::find($id);
        return view('perusahaan.edit',compact('r','data_bidang'));
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
        $id = decrypt($id);
        $data = Perusahaan::find($id);

        $data->id_bidang = $request->input('id_bidang');
        $data->perusahaan = $request->input('namaperusahaan');
        $data->kota = $request->input('kota');
        $data->alamat = $request->input('alamat');
        $data->kode_pos = $request->input('kodepos');
        $data->telp = $request->input('telepon');
        $data->website = $request->input('website');
        $data->email = $request->input('email');
        $data->status = $request->input('status');
        $data->update();
        Session::flash('message', 'Data Berhasil Diupdate'); 
        Session::flash('alert-class', 'alert-info'); 
        return redirect(url('/perusahaan'));
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
        $id = decrypt($id);
        $data = Perusahaan::find($id);
        $data->delete();
        Session::flash('message', 'Data Berhasil Dihapus'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect(url('/perusahaan'));
    }
}


