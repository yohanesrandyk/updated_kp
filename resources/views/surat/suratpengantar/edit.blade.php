<?php
$record = explode(';',$r->isi);
?>
@extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Data Surat Pengantar</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{url('/suratpengantar')}}">Data Surat Pengantar</a>
                </li>
                <li class="active">
                    <strong>Edit Data Surat Pengantar</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    @endsection
    @section('content')
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Edit Data Surat Pengantar</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-md-2 col-xs-12 control-label">Perusahaan *</label>
                <div class="col-md-10">
                    <select class="form-control chosen-select" name="perusahaan">
                        <option value="">Perusahaan</option>
                        @foreach($perusahaan as $datas)
                            <option value="{{$datas->id_perusahaan}}" {{$datas->id_perusahaan==$r->id_perusahaan?"selected":""}}>{{$datas->perusahaan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Tanggal Keluar *</label>
                <div class="col-sm-10">
                    <input type="text" class="input-group date form-control" name="tanggalkeluar"  value="{{$r->tgl_keluar}}" data-date-format='dd/mm/yyyy'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Waktu Mulai *</label>
                <div class="col-sm-10">
                    <input type="text" class="input-group date form-control" name="wm" data-date-format='dd M yyyy' value="{{$record[0]}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Waktu Selesai *</label>
                <div class="col-sm-10">
                    <input type="text" class="input-group date form-control" name="ws" data-date-format='dd M yyyy' value="{{$record[1]}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Kepala Sekolah*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ks" required value="{{$record[2]}}">
                </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-md-2 control-label"></label>
              <div class="col-sm-10">
                  <input type="submit" value="Update" class="btn btn-primary btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection
