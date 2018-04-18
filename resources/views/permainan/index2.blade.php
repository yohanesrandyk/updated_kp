@extends('layout.wrapper')
@section('dashboard-header')
  <div class="col-lg-12">
    <div class="row border-bottom white-bg dashboard-header">
      <embed style="width: 100%;height: 400px;" src="{{ asset('swf/'.$game.'.swf')}}"></embed>
    </div>
  </div>
@endsection

@section('content')
      <div class="col-lg-12">
          <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        <h2>Tips Bermain</h2>
                        <p>
                            Mohon di perhatikan ketentuan ketentuan berikut:
                            <ol>
                              <li>Disarankan membuka aplikasi di browser desktop anda.</li>
                              <li>Disarankan membuka aplikasi di browser Chrome.</li>
                              <li>Jika permainan tidak muncul, buka chrome://plugins/ dan pastikan "Adobe Flash Player" aktif</li>
                              <li>Tombol bar menu tidak akan tampil ketika membuka aplikasi dalam versi mobile, maka tekan tombol kembali device anda.</li>
                            </ol>
                        </p>
                    </div>
                </div>
      </div>
@endsection
