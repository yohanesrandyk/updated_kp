@extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Surat Tugas</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{url('/surattugas')}}">Data Surat Tugas</a>
                </li>
                <li class="active">
                    <strong>Input Data Surat Tugas</strong>
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
            <h5>Input Data Surat Tugas</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Nomor Surat*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_surat" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-xs-12 control-label">Perusahaan *</label>
                <div class="col-md-10">
                    <select class="form-control chosen-select" name="perusahaan">
                    	<option value="">Perusahaan</option>
                        @foreach($perusahaan as $r)
                            <option value="{{$r->id_perusahaan}}">{{$r->perusahaan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-xs-12 control-label">Pembimbing PKL *</label>
                <div class="col-md-10">
                    <select class="form-control chosen-select" name="namapemb">
                        <option value="">Pembimbing PKL</option>
                        @foreach($user as $r)
                            <option value="{{$r->id}}">{{$r->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Tanggal Keluar *</label>
                <div class="col-sm-10">
                    <input type="text" class="input-group date form-control" name="tanggalkeluar" data-date-format='dd/mm/yyyy'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Tahun Pelajaran *</label>
                <div class="col-sm-10">
                    <select class="form-control chosen-select" name="ajaran">
                        @for($i=2017; $i<=date('Y');$i++)
                           	<option value="{{$i}} / {{$i+1}}">{{$i}} / {{$i+1}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-md-2 control-label">Kepala Sekolah*</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ks" required>
                </div>
            </div>
            <div class="form-group">
              <label class="col-xs-12 col-md-2 control-label"></label>
              <div class="col-sm-10">
                  <input type="submit" value="Simpan" class="btn btn-primary btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection
