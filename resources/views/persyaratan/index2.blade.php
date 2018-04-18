@extends('layout.wrapper')
@if(Auth::user()->id_role!=3)
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Detail Persyaratan Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/siswa')}}">Data Siswa</a>
                  </li>
                  <li class="active">
                      <strong>Detail Persyaratan Siswa</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
@endif
@section('content')
<div class="col-lg-12">
      <div class="alert alert-class alert-info">
            Klik persyaratan untuk melihat detail!
      </div>
    </div>
  <div class="col-lg-12">
    <div class="ibox float-e-margins">
    <div class="ibox-title"><h5>Detail Persyaratan</h5></div>
    <div class="ibox-content">

      <div class="col-md-6">

                  <div class="profile-image">
                      <img src="{{ asset('img/elliot.jpg')}}" style="width:96px;height:96px" class="img-circle circle-border m-b-md" alt="profile">
                  </div>
                  <div class="profile-info">
                      <div class="">
                          <div>
                              <h2 class="no-margins">
                                  {{ $user->nama }} ({{$siswa->nis}})
                              </h2>
                              <h4> {{$rombel->rombel}} - {{$rayon->rayon}} </h4>
                              <small>
                                {{$jurusan->jurusan}}
                              </small>
                          </div>
                      </div>
                  </div>
              </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" >
              <thead>
                <th>No.</th>
                <th>Persyaratan</th>
                <th>Status</th>
              </thead>
              <tbody>
                <tr  data-toggle="popover" data-placement="auto top" data-content="Menyelesaikan buku SKU." data-original-title="" title="">
                  <td>1</td>
                  <td>Bantara</td>
                  <td>@if($res->bantara == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Menyelesaikan seluruh nilai mata pelajaran dari semester 1 sampai 4." data-original-title="" title="">
                  <td>2</td>
                  <td>Nilai</td>
                  <td>@if($res->nilai == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Menyelesaikan administrai sesuai yang telah ditentukan." data-original-title="" title="">
                  <td>3</td>
                  <td>Keuangan</td>
                  <td>@if($res->keuangan == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Hubungi bagian kesiswaan untuk informasi lebih lanjut." data-original-title="" title="">
                  <td>4</td>
                  <td>Kesiswaan</td>
                  <td>@if($res->kesiswaan == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Mengikuti dan menyelesaikan seluruh rangkaian kegiatan CBT Produktif berdasar jurusan." data-original-title="" title="">
                  <td>5</td>
                  <td>CBT Produktif</td>
                  <td>@if($res->cbt_prod == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Mengikuti seluruh rangkaian kegiatan pengayaan PKL." data-original-title="" title="">
                  <td>6</td>
                  <td>Kehadiran Pengayaan PKL</td>
                  <td>@if($res->kehadiran_pengayaan_pkl == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Mengikuti dan menyelesaikan seluruh rangkaian Uji Kelayakan berdasar jurusan." data-original-title="" title="">
                  <td>7</td>
                  <td>Lulus Uji Kelayakan</td>
                  <td>@if($res->lulus_ujikelayakan == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
                <tr data-toggle="popover" data-placement="auto top" data-content="Mengembalikan buku pinjaman perpustakaan." data-original-title="" title="">
                  <td>8</td>
                  <td>Perpustakaan</td>
                  <td>@if($res->perpustakaan == 1) <i class="fa fa-check-square text-navy"></i>  Selesai @else <i class="fa fa-times-rectangle text-danger"></i> Belum terpenuhi @endif</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
