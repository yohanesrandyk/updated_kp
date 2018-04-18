@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Input Data Jurnal Harian</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/jurnal')}}">Data Jurnal Harian</a>
                  </li>
                  <li class="active">
                      <strong>Input Data Jurnal Harian</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
    @section('content')
    <div class="col-lg-12">
        <div class="alert alert-class alert-warning">
            Jurnal hanya boleh diisi ketika menyelesaikan kegiatan di perusahaan dalam satu hari!
        </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Data Jurnal Harian</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Divisi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="divisi" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Waktu</label>
                <div class="col-sm-5">
                    <input type="time" class="form-control" name="mulai">
                </div>
                <div class="col-sm-5">
                    <input type="time" class="form-control" name="selesai">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Bentuk Kegiatan *</label>
                <div class="col-sm-10">
                    <textarea name="bentuk_kegiatan" class="form-control required"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Hasil Pencapaian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hasil_pencapaian">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea name="ket" class="form-control"></textarea>
                </div>
            </div>
<div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Simpan">
              </div>
            </div>          </form>
        </div>
      </div>
    </div>
    @endsection
