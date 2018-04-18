@extends('layout.wrapper')
@section('dashboard-header')
  <div class="col-lg-12">
    <div class="row border-bottom white-bg dashboard-header">
      <div class="row">
        <div class="col-md-5">

                                    <h2 class="font-bold m-b-xs">
                                        Permainan
                                    </h2>
                                    <small>Mainkan permainan gabut ini!</small>
                                    <hr>
                                    <div class="small text-muted">
                                        Dalam aplikasi ini kami menyediakan beberapa pilihan permainan yang bisa anda mainkan.
                                        <br>
                                        <br>
                                        Terdapat SuperMario Bros, game arcade tahun '98 yang mengharuskan anda menyelamatkan sang putri dari seekor naga, lalu Pacman-game keluaran tahun sama ini mengharuskan anda memakan semua pil yang tersdia untuk maju ke level selanjutnya dan masih banyak lagi.
                                    </div><br><br>
                                    
                                    



                                </div>
        <div class="col-md-7">
          <div class="carousel slide" id="carousel2">
                                <ol class="carousel-indicators">
                                    <li data-slide-to="0" data-target="#carousel2" class="active"></li>
                                    <li data-slide-to="1" data-target="#carousel2"></li>
                                    <li data-slide-to="2" data-target="#carousel2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="image" class="img-responsive" src="{{ asset('img/game/pacman_L.png')}}">
                                        <div class="carousel-caption">
                                            <p>Pacman. </p>
                                        </div>
                                    </div>
                                    <div class="item ">
                                        <img alt="image" class="img-responsive" src="{{ asset('img/game/mario_L.png')}}">
                                        <div class="carousel-caption">
                                            <p>Super Mario Bros</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img alt="image" class="img-responsive" src="{{ asset('img/game/paladin_L.png')}}">
                                        <div class="carousel-caption">
                                            <p>Paladin</p>
                                        </div>
                                    </div>
                                </div>
                                <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
      <div class="col-lg-12">
          <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>Kumpulan Permainan</h2>
                        <p>
                            Pilih permainan yang anda inginkan.
                        </p>

                        <div class="lightBoxGallery">
                            <a href="permainan/pacman" title="Pacman" data-gallery=""><img src="{{ asset('img/game/pacman_S.png')}}"></a>
                            <a href="permainan/supermario" title="Super Mario" data-gallery=""><img src="{{ asset('img/game/mario_S.png')}}"></a>
                            <a href="permainan/tank_trouble" title="Tank Trouble" data-gallery=""><img src="{{ asset('img/game/tank_S.png')}}"></a>
                            <a href="permainan/paladin" title="Paladin" data-gallery=""><img src="{{ asset('img/game/paladin_S.png')}}"></a>
                            
                        </div>

                    </div>
                </div>
      </div>
@endsection
