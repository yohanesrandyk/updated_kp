@extends('layout.wrapper')
@section('content')
    <div class="col-lg-12">
      <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Pilih Kota</h5>
        </div>
        <div class="ibox-content">
          <form class="form-horizontal m-t-md" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Area PKL *</label>
                <div class="col-sm-10">
                    <select class="form-control" name="area" required="">
                    	<option value="" selected="">Pilih Area</option>
                    	<option value="1">Bogor</option>
                    	<option value="2">Jabodetabek</option>
                    	<option value="3">Luar Jabodetabek</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
                  <input type="submit" value="Simpan" class="btn btn-primary btn-block">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
@endsection
