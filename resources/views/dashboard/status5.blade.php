@extends('layout.wrapper')
@section('content')
    <div class="col-lg-12">
    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <h2 name="trigger_animation">Detail Magang Perusahaan</h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt name="trigger_animation">Status:</dt> <dd><span class="label label-primary">Active</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                    	<dt name="trigger_animation">Nama :</dt> <dd name="trigger_animation">{{Auth::user()->nama}}</dd>
                                        <dt name="trigger_animation">Jurusan :</dt> <dd name="trigger_animation">{{$jurusan->jurusan}}</dd>
                                        <dt name="trigger_animation">Rombel :</dt> <dd name="trigger_animation">{{$rombel->rombel}}</dd>
                                        <dt name="trigger_animation">Client :</dt> <dd name="trigger_animation"><a target="_blank" href="http://{{$perusahaan->website}}" class="text-navy">{{$perusahaan->perusahaan}}</a> </dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal">

                                        <dt name="trigger_animation">Mulai magang :</dt> <dd name="trigger_animation">{{$mulai}}</dd>
                                        <dt name="trigger_animation">Selesai pada :</dt> <dd name="trigger_animation">{{$selesai}}</dd>
                                        <dt name="trigger_animation">Lama magang :</dt> <dd name="trigger_animation">{{$days}} hari</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt name="trigger_animation">Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: @if($precentage>100) 100% @else {{$precentage}}% @endif;" class="progress-bar"></div>
                                            </div>
                                            <small name="trigger_animation">Progres magang sebesar <strong>@if($precentage>100) 100% @else {{$precentage}}% @endif</strong>. Selamat menyelesaikan kegiatan magang.</small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @if($rekan)
                 <div class="ibox">
                        <div class="ibox-content">
                            <h2 name="trigger_animation">Rekan Magang</h2>
                            <p name="trigger_animation">
                                Teman teman yang akan bergabung dengan anda.
                            </p>
                    </div>
                    </div>
                    <div class="row">
                    @foreach($rekan as $data) 
            <div class="col-lg-4">
                <div class="contact-box">
                    <!-- <a href="profile.html"> -->
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ asset('img/emptyUser.jpg')}}">
                            <div class="m-t-xs font-bold"> {{$data->jurusan}}</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{$data->nama}}</strong></h3>
                        <p>{{$data->rombel}}</p>
                        <address name="trigger_animation">
                            <i class="fa fa-map-marker"></i> {{$data->alamat}}<br>
                            <abbr title="Phone">P:</abbr> {{$data->telp}}
                        </address>
                    </div>
                    <div class="clearfix"></div>
                        <!-- </a> -->
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
