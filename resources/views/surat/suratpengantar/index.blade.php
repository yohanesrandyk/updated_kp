@extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Surat Pengantar</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <!-- <li>
                    Surat
                </li> -->
                <li class="active">
                    <strong>Surat Pengantar</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    @endsection

    @section('content')
    @if(Auth::user()->id_role == 1)
    <div class="col-lg-12">
      <div class="alert alert-class alert-info">
            Klik 2 kali pada baris untuk mengedit baris!
      </div>
    </div>
    @endif
      @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ Session::get('message') }}
        </div>
      @endif
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Tabel Data Surat Pengantar</h5>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                  <tr>
                    <th>No Surat</th>
                    <th>Nama Perusahaan</th>
                    <th>Tanggal Keluar</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $r)
                  <tr @if(Auth::user()->id_role == 1) ondblclick="document.getElementById('{{$r->id_surat}}').click()" @endif>
                    <td>{{$r->nomersurat}}</td>
                    <td>{{$r->getPerusahaan->perusahaan}}</td>
                    <td>{{$r->tgl_keluar}}</td>
                    <td>
                      @if(Auth::user()->id_role == 1)<a style="display: none;" id="{{$r->id_surat}}" href="{{url('suratpengantar/e/'.encrypt($r->id_surat))}}"></a>
                      <a href="{{url('suratpengantar/del/'.encrypt($r->id_surat))}}" onclick="return confirm('Surat dengan nomer {{$r->nomersurat}} akan dihapus ?')"><i class="fa fa-trash text-danger"></i></a> | @endif
                      <a onclick="
                        var targURL = '{{url("suratpengantar/print/".encrypt($r->id_surat))}}';
                        var newTab = window.open (targURL, '_blank');
                      "><i class="fa fa-print text-info"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if(Auth::user()->id_role == 1)
            <a href="suratpengantar/add" class="btn btn-primary">Tambah</a>
            @endif
          </div>
      </div>
    </div>
    @endsection
