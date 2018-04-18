@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Jurnal Harian</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="active">
                      <strong>Data Jurnal Harian</strong>
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
              <h5>Tabel Data Jurnal Harian <a onclick="var targURL = '{{url("jurnal/print")}}';var newTab = window.open (targURL, '_blank');"><i class="fa fa-print text-info"></i></a></h5>
          </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-striped table-hover dataTables-example">
                <thead>
                  <tr>
                    <th rowspan="2">Divisi</th>
                    <th rowspan="2">Tanggal</th>
                    <th colspan="2">Waktu</th>
                    <th rowspan="2">Kegiatan Yang Dilakukan</th>
                    <th rowspan="2">Hasil yang Dicapai</th>
                    <th rowspan="2">Keterangan Kegiatan</th>
                    <th rowspan="2">Paraf</th>
                  </tr>
                  <tr>
                    <th>Mulai</th>
                    <th>Selesai</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($jurnal)>0)
                    @foreach ($jurnal as $data)
                      <tr>
                        <td>{{$data->divisi}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->mulai}}</td>
                        <td>{{$data->selesai}}</td>
                        <td>{{$data->bentuk_kegiatan}}</td>
                        <td>{{$data->hasil_pencapaian}}</td>
                        <td>{{$data->ket}}</td>
                        <td>@if ($data->paraf == "0") Tidak @else Ya @endif</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <a href="jurnal/add" class="btn btn-primary" @if ($today > 0) disabled @endif>Isi jurnal hari ini</a>
          </div>
        </div>
      </div>
@endsection
