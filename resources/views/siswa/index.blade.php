@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="active">
                      <strong>Data Siswa</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
@section('content')
@if(Auth::user()->id_role==1) 
<div class="col-lg-12">
      <div class="alert alert-class alert-info">
            Klik 2 kali pada baris untuk mengedit baris!
      </div>
    </div>
@elseif(Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role == 9)
<div class="col-lg-12">
      <div class="alert alert-class alert-info">
            Klik 2 kali pada siswa untuk melihat detail persyaratan siswa!
      </div>
    </div>
@endif
  <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Tabel Data Siswa</h5>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <th>NIS</th>
                <th>Nama</th>
                <th>Rayon</th>
                <th>Jurusan</th>
                <th>Rombel</th>
                <th>JK</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                @if(Auth::user()->id_role==1)
                <th>Opsi</th>
                @endif
              </thead>
              <tbody>
                @foreach ($siswa as $data)
                  <tr 
                  @if(Auth::user()->id_role==1) 
                  ondblclick="document.getElementById('{{$data->id}}').click();"
                  @elseif(Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role == 9)
                  ondblclick="document.getElementById('syarat{{$data->id}}').click();" 
                  @endif
                  >
                    <a id="syarat{{$data->id}}" href="siswa/{{encrypt($data->nis)}}" style="display:none"></a>
                    <a id="{{$data->id}}" href="siswa/e/{{encrypt($data->id)}}" style="display:none"></a>
                    <td>{{$data->nis}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->rayon}}</td>
                    <td>{{$data->jurusan}}</td>
                    <td>{{$data->rombel}}</td>
                    <td>{{$data->jk}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->telp}}</td>
                    <td>{{$data->alamat}}</td>
                    @if(Auth::user()->id_role==1)
                    <td><a href="siswa/del/{{encrypt($data->id)}}" onclick="return confirm('Anda yakin ingin menghapus siswa ?')"><i class="fa fa-trash text-danger"></i></a></td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @if(Auth::user()->id_role==1)
          <a href="siswa/add" class="btn btn-primary">Tambah</a>
          @endif
        </div>
      </div>
  </div>
@endsection
