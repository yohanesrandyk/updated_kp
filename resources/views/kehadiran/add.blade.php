@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Input Data Kehadiran</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/kehadiran')}}">Data Kehadiran</a>
                  </li>
                  <li class="active">
                      <strong>Input Data Kehadiran</strong>
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
            Kehadiran hanya boleh diisi ketika menyelesaikan kegiatan di perusahaan dalam satu hari!
        </div>
    </div>
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Input Data Kehadiran</h5>
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
                    <input type="time" class="form-control" name="datang">
                </div>
                <div class="col-sm-5">
                    <input type="time" class="form-control" name="pulang">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-10">
                    <select name="ket" class="form-control">
                        <option disabled selected>Pilih Keterangan</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alpa">Alpa</option>
                    </select>
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
