@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data User</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="active">
                      <strong>Data User</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
@section('content')
<div class="col-lg-12">
      <div class="alert alert-class alert-info">
            Klik 2 kali pada baris untuk mengedit baris!
      </div>
    </div>
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Tabel Data User</h5>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Role</th>
                <th>Opsi</th>
              </thead>
              <tbody>
                @foreach ($user as $data)
                  <tr ondblclick="document.getElementById('{{$data->id}}').click();">
                    <a id="{{$data->id}}" href="user/e/{{encrypt($data->id)}}" style="display:none"></a>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->telp}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>
                      @foreach($role as $d_role)
                        @if($data->id_role == $d_role->id_role)
                          {{$d_role->role}}
                        @endif
                      @endforeach
                    </td>
                    <td><a href="user/del/{{encrypt($data->id)}}" onclick="return confirm('Anda yakin ingin menghapus user ?')"><i class="fa fa-trash text-danger"></i></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <a href="user/add" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
@endsection
