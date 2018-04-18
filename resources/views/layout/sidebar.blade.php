<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse" name="trigger_animation">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                  <span>
                        <img alt="image" class="img-circle" src="{{ asset('img/elliot.jpg')}}" style="width:48px;height:48px"/>
                  </span>
                  <a href="">
                      <span class="clear"> <span class="block m-t-xs">
                        <strong class="font-bold">{{Auth::user()->nama}}</strong>
                      </span>
                      <span class="text-muted text-xs block">
                        @if (Auth::user()->id_role == "1")
                        BKK
                        @elseif(Auth::user()->id_role == "2")
                        Kepala Program
                        @elseif(Auth::user()->id_role == "3")
                        Siswa
                        @elseif(Auth::user()->id_role == "4")
                        Pembimbing Rayon
                        @elseif(Auth::user()->id_role == "5")
                        Pembimbing Pramuka
                        @elseif(Auth::user()->id_role == "6")
                        Perpustakaan
                        @elseif(Auth::user()->id_role == "7")
                        Kesiswaan
                        @elseif(Auth::user()->id_role == "8")
                        Keuangan
                        @endif
                      </span>
                    </span>
                  </a>
                </div>
                <div class="logo-element">
                    I
                </div>
            </li>
            <li class="{{ (Request::is('home*')) ? 'active' : ' ' }}">
                <a href="{{url('/home')}}"><i class="fa fa-th-large"></i><span class="nav-label">Beranda</span></a>
            </li>
            @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 4 || Auth::user()->id_role==9)
            <li class="{{ (Request::is('siswa*')) ? 'active' : ' ' }}">
                <a href="{{url('siswa')}}"><i class="fa fa-users"></i><span class="nav-label">Daftar Siswa</span></a>
            </li>
            @endif
            @if(Auth::user()->id_role==9)
            <li class="{{ Request::is('suratpermohonan*') || Request::is('suratpengantar*') || Request::is('surattugas*') ? 'active' : ' ' }}">
                <a href=""><i class="fa fa-envelope-o"></i> <span class="nav-label">Daftar Surat</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ Request::is('suratpermohonan*') ? 'active' : ' ' }}"><a href="{{url('suratpermohonan')}}">Surat Permohonan</a></li>
                    <li class="{{ Request::is('suratpengantar*') ? 'active' : ' ' }}"><a href="{{url('suratpengantar')}}">Surat Pengantar</a></li>
                    <li class="{{ Request::is('surattugas*') ? 'active' : ' ' }}"><a href="{{url('surattugas')}}">Surat Tugas</a></li>
                </ul>
            </li>
            <li class="{{ (Request::is('perusahaan*')) ? 'active' : ' ' }}">
                <a href="{{url('perusahaan')}}"><i class="fa fa-building-o"></i><span class="nav-label">Perusahaan</span></a>
            </li>
            <li class="{{ (Request::is('referensi*')) ? 'active' : ' ' }}">
                <a href="{{url('referensi')}}"><i class="fa fa-archive"></i><span class="nav-label">Referensi Siswa</span></a>
            </li>
            @endif
            @if (Auth::user()->id_role == 1)
            <li class="{{ Request::is('suratpermohonan*') || Request::is('suratpengantar*') || Request::is('surattugas*') ? 'active' : ' ' }}">
                <a href=""><i class="fa fa-envelope-o"></i> <span class="nav-label">Daftar Surat</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ Request::is('suratpermohonan*') ? 'active' : ' ' }}"><a href="{{url('suratpermohonan')}}">Surat Permohonan</a></li>
                    <li class="{{ Request::is('suratpengantar*') ? 'active' : ' ' }}"><a href="{{url('suratpengantar')}}">Surat Pengantar</a></li>
                    <li class="{{ Request::is('surattugas*') ? 'active' : ' ' }}"><a href="{{url('surattugas')}}">Surat Tugas</a></li>
                </ul>
            </li>
            <li class="{{ (Request::is('user*')) ? 'active' : ' ' }}">
                <a href="{{url('user')}}"><i class="fa fa-user"></i><span class="nav-label">Daftar User</span></a>
            </li>
            <li class="{{ (Request::is('perusahaan*')) ? 'active' : ' ' }}">
                <a href="{{url('perusahaan')}}"><i class="fa fa-building-o"></i><span class="nav-label">Perusahaan</span></a>
            </li>
            <li class="{{ (Request::is('referensi*')) ? 'active' : ' ' }}">
                <a href="{{url('referensi')}}"><i class="fa fa-archive"></i><span class="nav-label">Referensi Siswa</span></a>
            </li>
            <li class="{{ (Request::is('bidangperusahaan*')) ? 'active' : ' ' }}">
                <a href="{{url('bidangperusahaan')}}"><i class="fa fa-bookmark"></i><span class="nav-label">Bidang Perusahaan</span></a>
            </li>
            @endif
            @if(Auth::user()->id_role == 2 || Auth::user()->id_role==9)
            <li class="{{ (Request::is('penempatan*')) ? 'active' : ' ' }}">
                <a href="{{url('penempatan')}}"><i class="fa fa-map-marker"></i><span class="nav-label">Penempatan</span></a>
            </li>
            @endif
            @if (Auth::user()->id_role == 2 || Auth::user()->id_role > 3 && Auth::user()->id_role!=9)
            <li class="{{ (Request::is('persyaratan*')) ? 'active' : ' ' }}">
                <a href="{{url('persyaratan')}}"><i class="fa fa-check"></i><span class="nav-label">Persyaratan Siswa</span></a>
            </li>
            @endif
            @if (Auth::user()->status == 5)
            <li class="{{ (Request::is('jurnal*')) ? 'active' : ' ' }}">
                <a href="{{url('jurnal')}}"><i class="fa fa-book"></i><span class="nav-label">Jurnal Harian</span></a>
            </li>
            <li class="{{ (Request::is('kehadiran*')) ? 'active' : ' ' }}">
                <a href="{{url('kehadiran')}}"><i class="fa fa-check"></i><span class="nav-label">Absensi Kehadiran</span><span class="label label-info pull-right"></span></a>
            </li>
            @endif
            <li class="special_link">
                <a href="{{url('permainan')}}"><i class="fa fa-gamepad"></i><span class="nav-label">Permainan</span><span class="label label-info pull-right"></span></a>
            </li>
            <li class="{{ (Request::is('pengembang*')) ? 'active' : ' ' }}">
                <a href="{{url('pengembang')}}"><i class="fa fa-gears"></i><span class="nav-label">Pengembang</span><span class="label label-info pull-right"></span></a>
            </li>
        </ul>
    </div>
</nav>
