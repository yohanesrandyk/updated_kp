@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Referensi Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/referensi')}}">Data Referensi Siswa</a>
                  </li>
                  <li class="active">
                      <strong>Data Rayon</strong>
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
            <h5>Input Data Rayon</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama Rayon *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="rayon" required>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
                  <input type="submit" class="btn btn-primary btn-block" name="submit" value="Simpan">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection
