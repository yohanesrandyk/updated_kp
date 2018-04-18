@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Referensi Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="active">
                      <strong>Data Referensi Siswa</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
@section('content')
  <div class="col-lg-6">
      <div class="ibox float-e-margins collapsed">
        <div class="ibox-title"><h5>Tabel Data Rayon</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <!-- <div class="table-responsive"> -->
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <th>Rayon</th>
              </thead>
              <tbody>
                @foreach ($rayon as $data)
                  <tr>
                    <td>{{$data->rayon}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          <!-- </div> -->
          @if(Auth::user()->id_role == 1)
          <a href="rayon/add" class="btn btn-primary">Tambah</a>
          @endif
        </div>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="ibox float-e-margins collapsed">
        <div class="ibox-title"><h5>Tabel Data Rombel</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <!-- <div class="table-responsive"> -->
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <th>Rombel</th>
              </thead>
              <tbody>
                @foreach ($rombel as $data)
                  <tr>
                    <td>{{$data->rombel}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          <!-- </div> -->
          @if(Auth::user()->id_role == 1)
          <a href="rombel/add" class="btn btn-primary">Tambah</a>
          @endif
        </div>
      </div>
  </div>
  <div class="col-lg-12">
      <div class="ibox float-e-margins collapsed">
        <div class="ibox-title"><h5>Tabel Data Jurusan</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <!-- <div class="table-responsive"> -->
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <th>Jurusan</th>
              </thead>
              <tbody>
                @foreach ($jurusan as $data)
                  <tr>
                    <td>{{$data->jurusan}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          <!-- </div> -->
          @if(Auth::user()->id_role == 1)
          <a href="jurusan/add" class="btn btn-primary">Tambah</a>
          @endif
        </div>
      </div>
  </div>
@endsection
