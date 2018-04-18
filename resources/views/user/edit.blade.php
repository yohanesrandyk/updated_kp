@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Edit Data User</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/user')}}">Data User</a>
                  </li>
                  <li class="active">
                      <strong>Edit Data User</strong>
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
            <h5>Edit Data User</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required value="{{$user->nama}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Telpon</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="telp" value="{{$user->telp}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bop" required value="{{$user->bop}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="bod" required value="{{$user->bod}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea name="alamat" class="form-control">{{$user->alamat}}</textarea>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection