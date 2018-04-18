<?php
$record = explode(';',$r->isi);
?>
@extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Data Surat Permohonan</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{url('/suratpermohonan')}}">Data Surat Permohonan</a>
                </li>
                <li class="active">
                    <strong>Edit Data Surat Permohonan</strong>
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
            <h5>Edit Data Surat Permohonan</h5>
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
                    <input type="text" class="input-group date form-control" name="tanggalkeluar" value="{{$r->tgl_keluar}}" data-date-format='dd/mm/yyyy'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Waktu ( Minggu ) *</label>
                <div class="col-sm-10">
                    <select class="form-control chosen-select" name="minggu">
                        @for($i=1; $i<=48;$i++)
                        	@if($i % 7 == 0)
                            	<option value="{{$i}}" {{$i==$record[0]?"selected":""}}>{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group xs-hidden">
                <label class="col-xs-12 col-md-2 control-label">Waktu ( Bulan ) *</label>
                <div class="col-sm-3">
                    <select class="form-control chosen-select" name="awal">
                    	<option>Mulai</option>
                        @for($i=0; $i<count($bulan);$i++)
                            	<option value="{{$bulan[$i]}}" {{$bulan[$i]==$record[1]?"selected":""}}>{{$bulan[$i]}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-sm-3 xs-hidden">
                    <select class="form-control chosen-select" name="akhir">
                    	<option>Akhir</option>
                        @for($i=0; $i<count($bulan);$i++)
                            	<option value="{{$bulan[$i]}}" {{$bulan[$i]==$record[2]?"selected":""}}>{{$bulan[$i]}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control chosen-select" name="tahun">
                    	<option>Tahun</option>
                        @for($i=2017; $i<=date('Y');$i++)
                            	<option value="{{$i}}" {{$i==$record[3]?"selected":""}}>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Kontak Person *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kp" required value="{{$record[4]}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">No. Handphone *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="hp" required value="{{$record[5]}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Email *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" required value="{{$record[6]}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Kepala Sekolah *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ks" required value="{{$record[7]}}">
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
