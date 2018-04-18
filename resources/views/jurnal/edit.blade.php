<!-- @extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">            
        	<h2>Data Perusahaan</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Data Bidang Perusahaan</strong>
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
            <h5>Input Data Perusahaan</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Bidang *</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_bidang">
                        @foreach($data_bidang as $datas)
                            <option value="{{$datas->id_bidang}}" {{$datas->id_bidang==$r->id_bidang?"selected":""}}>{{$datas->bidangperusahaan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nama Perusahaan *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="namaperusahaan" required value="{{$r->perusahaan}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Kota *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kota" required value="{{$r->kota}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Alamat *</label>
                <div class="col-sm-10">
                    <textarea name="alamat" class="form-control required">{{$r->alamat}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Kode Pos *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="kodepos" required value="{{$r->kode_pos}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Telepon *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telepon" required value="{{$r->telp}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Website *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="website" required value="{{$r->website}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Email *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" required value="{{$r->email}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Status *</label>
                <div class="col-sm-10">
                  <select class="form-control" name="status">
                      <option value="0" {{$r->status=="0"?"selected":""}}>Pengajuan</option>
                      <option value="1" {{$r->status=="1"?"selected":""}}>Terverifikasi</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
                  <input type="submit" value="Update" class="btn btn-danger btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endsection
 -->