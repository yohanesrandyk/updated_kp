@extends('layout.wrapper')
@section('dashboard-header')
  <div class="col-lg-12">
    <div class="row border-bottom white-bg dashboard-header">
      @if(Auth::user()->id_role == 1 || Auth::user()->id_role==9)<div class="col-md-3">@endif
      @if(Auth::user()->id_role == 2 || Auth::user()->id_role == 4 && Auth::user()->id_role!=9)<div class="col-md-6">@endif
      @if(Auth::user()->id_role > 4 && Auth::user()->id_role!=9)<div class="col-md-6">@endif
                        <h2>Selamat Datang {{Auth::user()->nama}}!</h2>
                        <small>Anda memiliki beberapa tugas :</small>
                        <ul class="list-group clear-list m-t">
                        @if(Auth::user()->id_role==1)
                            <li class="list-group-item fist-item">
                                <span class="label label-success">1</span> Lengkapi referensi siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-info">2</span> Isi bidang perusahaan
                            </li>
                            <li class="list-group-item">
                                <span class="label label-primary">3</span> Masukkan data perusahaan
                            </li>
                            <li class="list-group-item">
                                <span class="label label-default">4</span> Masukkan data user
                            </li>
                            <li class="list-group-item">
                                <span class="label label-warning">5</span> Masukkan data siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-danger">6</span> Kelola surat
                            </li>
                          @endif
                          @if(Auth::user()->id_role==2 || Auth::user()->id_role==4)
                          <li class="list-group-item fist-item">
                                <span class="label label-success">1</span> Memeriksa kelengkapan persyaratan siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-primary">2</span> Mengisi pemenuhan persyaratan siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-default">3</span> Mengingatkan siswa untuk segera melengkapi persyaratan PKL
                            </li>
                            @if(Auth::user()->id_role==2)
                            <li class="list-group-item">
                                <span class="label label-info">4</span> Menempatkan siswa di perusahaan perusahaan
                            </li>
                            @endif
                          @endif
                          @if(Auth::user()->id_role > 4 && Auth::user()->id_role != 9)
                          <li class="list-group-item fist-item">
                                <span class="label label-success">1</span> Memeriksa kelengkapan persyaratan siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-primary">2</span> Mengisi pemenuhan persyaratan siswa
                            </li>
                          @endif
                          @if(Auth::user()->id_role == 9)
                          <li class="list-group-item fist-item">
                                <span class="label label-success">1</span> Memonitor referensi siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-info">2</span> Memonitor data siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-primary">3</span> Memonitor data perusahaan
                            </li>
                            <li class="list-group-item">
                                <span class="label label-default">4</span> Memonitor data surat
                            </li>
                            <li class="list-group-item">
                                <span class="label label-warning">5</span> Memonitor persayartan siswa
                            </li>
                            <li class="list-group-item">
                                <span class="label label-danger">6</span> Memonitor penempatan siswa
                            </li>
                          @endif
                        </ul>
                    </div>

                    <div class="col-md-3">
                      <div class="widget style1 red-bg">
                          <div class="row">
                              <div class="col-xs-4">
                                  <i class="fa fa-users fa-5x"></i>
                              </div>
                              <div class="col-xs-8 text-right">
                                  <span> Total Siswa </span>
                                  <h2 class="font-bold">{{$siswa}}</h2>
                              </div>
                          </div>
                      </div>
                    </div>
                    @if(Auth::user()->id_role == 2 || Auth::user()->id_role >= 4 || Auth::user()->id_role == 9)
                    <div class="col-md-3">
                      <div class="widget style1 navy-bg">
                          <div class="row">
                              <div class="col-xs-4">
                                  <i class="fa fa-check-square fa-5x"></i>
                              </div>
                              <div class="col-xs-8 text-right">
                                  <span> Total Siswa Selesai </span>
                                  <h2 class="font-bold">{{$selesai}}</h2>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="widget style1 yellow-bg">
                          <div class="row">
                              <div class="col-xs-4">
                                  <i class="fa fa-square-o fa-5x"></i>
                              </div>
                              <div class="col-xs-8 text-right">
                                  <span> Total Siswa Belum Selesai</span>
                                  <h2 class="font-bold">{{$belum_selesai}}</h2>
                              </div>
                          </div>
                      </div>
                    </div>
                    @endif
                    @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 9)
                    <div class="col-md-3">
                      <div class="widget style1 yellow-bg">
                          <div class="row">
                              <div class="col-xs-4">
                                  <i class="fa fa-building-o fa-5x"></i>
                              </div>
                              <div class="col-xs-8 text-right">
                                  <span> Total Perusahaan </span>
                                  <h2 class="font-bold">{{$perusahaan}}</h2>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="widget style1 blue-bg">
                          <div class="row">
                              <div class="col-xs-4">
                                  <i class="fa fa-bookmark fa-5x"></i>
                              </div>
                              <div class="col-xs-8 text-right">
                                  <span> Total Bidang Per. </span>
                                  <h2 class="font-bold">{{$bidangperusahaan}}</h2>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="widget style1 navy-bg">
                          <div class="row">
                              <div class="col-xs-4">
                                  <i class="fa fa-graduation-cap fa-5x"></i>
                              </div>
                              <div class="col-xs-8 text-right">
                                  <span> Total Jurusan </span>
                                  <h2 class="font-bold">{{$jurusan}}</h2>
                              </div>
                          </div>
                      </div>
                    </div>
                      <div class="col-md-3">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-university fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                    <span> Total Rombel </span>
                                    <h2 class="font-bold">{{$rombel}}</h2>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-8 text-right">
                                  <span> Total Rayon </span>
                                  <h2 class="font-bold">{{$rayon}}</h2>
                              </div>
                            </div>
                        </div>
                      </div>
                    @endif


    </div>
  </div>
@endsection

@section('content')
@if(Auth::user()->id_role <= 2 || Auth::user()->id_role == 9)
      <div class="col-lg-12">
          <div class="ibox float-e-margins">
            <div class="ibox-title"><h5>Perusahaan yang Telah Bekerja Sama</h5>
              <div class="ibox-tools">
                <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                </a>
              </div>
            </div>
            <div class="ibox-content">
              <div class="table-responsive">
                <table class="table table-hover margin bottom">
                                                  <thead>
                                                  <tr>
                                                      <th style="width: 1%" class="text-center">No.</th>
                                                      <th>Perusahaan</th>
                                                      <th class="text-center">Kota</th>
                                                      <th class="text-center">Kode Pos</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php $no=1; ?>
                                                  @foreach($perusahaan_p as $data)
                                                  <tr>
                                                      <td class="text-center">{{$no++}}</td>
                                                      <td>{{$data->perusahaan}}
                                                          </td>
                                                      <td class="text-center small">{{$data->kota}}</td>
                                                      <td class="text-center"><span class="label label-primary">{{$data->kode_pos}}</span></td>

                                                  </tr>
                                                  @endforeach
                                                  </tbody>
                                              </table>
              </div>
            </div>
          </div>
      </div>
      @endif
@endsection
