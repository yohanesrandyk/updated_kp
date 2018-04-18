<!-- @extends('layout.wrapper')
@section('content')
    <div class="col-lg-12">
    	<div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2>Detail Magang Perusahaan</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                    	<dt>Nama :</dt> <dd>{{Auth::user()->nama}}</dd>
                                        <dt>Jurusan :</dt> <dd>Rekayasa Perangkat Lunak</dd>
                                        <dt>Rombel :</dt> <dd>RPL XI - 2</dd>
                                        <dt>Client :</dt> <dd><a href="#" class="text-navy">{{$perusahaan->perusahaan}}</a> </dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal">

                                        <dt>Mulai magang :</dt> <dd>16.08.2014</dd>
                                        <dt>Selesai pada :</dt> <dd>10.07.2014</dd>
                                        <dt>Lama magang :</dt> <dd>164 hari</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: 10%;" class="progress-bar"></div>
                                            </div>
                                            <small>Progres magang sebesar <strong>10%</strong>. Selamat menyelesaikan kegiatan magang.</small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            
                        </div>
                    </div>
    </div>
@endsection
 -->