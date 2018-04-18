@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Input Data User</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/user')}}">Data User</a>
                  </li>
                  <li class="active">
                      <strong>Input Data User</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
  @section('content')
    @if ($errors->has('username'))
      <div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{ $errors->first('username') }}</div>
    @endif
    @if ($errors->has('email'))
      <div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{ $errors->first('email') }}</div>
    @endif
    @if ($errors->has('password'))
      <div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{ $errors->first('password') }}</div>
    @endif
    @if ($errors->has('password_confirmation'))
      <div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{ $errors->first('password_confirmation') }}</div>
     @endif
     @if ($errors->has('telp'))
      <div class="alert alert-warning alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{ $errors->first('telp') }}</div>
    @endif
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Input Data User</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" required value="{{ old('nama') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Telpon</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="telp" value="{{ old('telp') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="bop" required value="{{ old('bop') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="bod" required value="{{ old('bod') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Role *</label>
                <div class="col-sm-10">
                    <select class="chosen-select form-control" name="role" required="" onchange="
                      if(this.value == 2){
                        $('#jurusan').prop('disabled', false);
                        $('#rayon').prop('disabled', true);
                        $('#rayon').prop('required', false);
                        $('#jurusan').prop('required', true);
                      }else if(this.value == 4){
                        $('#rayon').prop('disabled', false);
                        $('#jurusan').prop('disabled', true);
                        $('#rayon').prop('required', true);
                        $('#jurusan').prop('required', false);
                      }else{
                        $('#rayon').prop('disabled', true);
                        $('#jurusan').prop('disabled', true);
                        $('#rayon').prop('required', false);
                        $('#jurusan').prop('required', false);
                      }
                    ">
                      <option value="" selected="">Pilih Role</option>
                      @foreach($role as $data)
                        @if($data->id_role==3)
                        @else
                        <option value="{{$data->id_role}}" @if($data->id_role==old('role')) selected @endif>{{$data->role}}</option>
                        @endif
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Jurusan</label>
                <div class="col-sm-10">
                    <select class="chosen-select form-control" name="jurusan" id="jurusan" disabled="">
                      <option value="" selected="">Pilih Jurusan</option>
                      @foreach($jurusan as $data)
                        <option value="{{$data->id_jurusan}}" @if($data->id_jurusan==old('jurusan')) selected @endif>{{$data->jurusan}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Rayon</label>
                <div class="col-sm-10">
                    <select class="chosen-select form-control" name="rayon" id="rayon" disabled="">
                      <option value="" selected="">Pilih Rayon</option>
                      @foreach($rayon as $data)
                        <option value="{{$data->id_rayon}}" @if($data->id_rayon==old('rayon')) selected @endif>{{$data->rayon}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" required value="{{ old('username') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password_confirmation" required>
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
