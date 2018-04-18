@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Edit Data Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/siswa')}}">Data Siswa</a>
                  </li>
                  <li class="active">
                      <strong>Edit Data Siswa</strong>
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
          <h5>Edit Data Siswa</h5>
      </div>
      <div class="ibox-content">
        <form class="form-horizontal m-t-md" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama *</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" required value="{{$siswa->nama}}">
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Agama *</label>
              <div class="col-sm-10">
                <select class="chosen-select form-control" name="agama" required>
                    <option value="" selected="">Pilih Agama</option>
                    <option value="Islam" @if ($siswa->agama=="Islam") selected @endif>Islam</option>
                    <option value="Kristen Protestan" @if ($siswa->agama=="Kristen Protestan") selected @endif>Kristen Protestan</option>
                    <option value="Kristen Katolik" @if ($siswa->agama=="Kristen Katolik") selected @endif>Kristen Katolik</option>
                    <option value="Kristen Ortodoks" @if ($siswa->agama=="Kristen Ortodoks") selected @endif>Kristen Ortodoks</option>
                    <option value="Hindu" @if ($siswa->agama=="Hindu") selected @endif>Hindu</option>
                    <option value="Buddha" @if ($siswa->agama=="Buddha") selected @endif>Buddha</option>
                    <option value="Konghucu" @if ($siswa->agama=="Konghucu") selected @endif>Konghucu</option>
                </select>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jenis Kelamin *</label>
              <div class="col-sm-10">
              <div class="radio radio-info radio-inline"><input id="radiol" type="radio" name="jk" value="L" @if ($siswa->jk == "L") checked="" @endif required><label for="radiol"> Laki - laki </label></div>
              <div class="radio radio-danger radio-inline"><input id="radiop" type="radio" name="jk" value="P" @if ($siswa->jk == "P") checked="" @endif required><label for="radiop"> Perempuan </label></div>
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Telpon *</label>
              <div class="col-sm-10">
                  <input type="number" class="form-control" name="telp" value="{{$siswa->telp}}" id="telp">
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir *</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="bop" required value="{{$siswa->bop}}">
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir *</label>
              <div class="col-sm-10">
                  <input type="date" class="form-control" name="bod" required value="{{$siswa->bod}}">
              </div>
          </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Alamat *</label>
              <div class="col-sm-10">
                <textarea name="alamat" class="form-control">{{$siswa->alamat}}</textarea>
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
