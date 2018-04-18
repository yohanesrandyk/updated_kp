@extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Kebutuhan Perusahaan</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Data Kebutuhan Perusahaan</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    @endsection

    @section('content')
      @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ Session::get('message') }}
        </div>
      @endif
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Tabel Kebutuhan Perusahaan</h5>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    @foreach($jurusan as $rj)
                    	<th>{{$rj->singakatan}}</th>	
                    @endforeach
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
	              @foreach ($data as $r)
                  <tr>
                        <td>{{$no++}}</td>
                        <td></td>
                        @foreach($jurusan as $rj)
                        	<td>{{$rj->id_jurusan==$r->id_jurusan?$r->jumlah_siswa:"0"}}</td>
                        @endforeach
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
    @endsection
