@extends('layout.wrapper')
    @section('breadcrumb')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Data Perusahaan</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Data Perusahaan</strong>
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
              <h5>Tabel Perusahaan</h5>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Website</th>
                    <th>Email</th>
                    <!-- <th>Opsi</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($data as $r)
                  @if($r->status==0)
                    <?php $status="Pengajuan"?>
                  @elseif($r->status==1)
                    <?php $status="Terverifikasi"?>
                  @endif
                  <tr @if(Auth::user()->id_role == 1) ondblclick="document.getElementById('{{$r->id_perusahaan}}').click();" @endif>
                    <a id="{{$r->id_perusahaan}}" href="perusahaan/e/{{encrypt($r->id_perusahaan)}}" style="display:none"></a>
                        <td>{{$no++}}</td>
                        <td>{{$r->perusahaan." [ ".$r->getBidang->bidangperusahaan." ] "}}</td>
                        <td>{{$r->alamat.', '.$r->kota.', '.$r->kode_pos}}</td>
                        <td>{{$r->telp}}</td>
                        <td>{{$r->website}}</td>
                        <td>{{$r->email}}</td>
                        <!-- <td></td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if(Auth::user()->id_role == 1)
            <a href="perusahaan/add" class="btn btn-primary">Tambah</a>
            @endif
          </div>
      </div>
    </div>
    @endsection
