@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Referensi Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/')}}">Data Referensi Siswa</a>
                  </li>
                  <li class="active">
                      <strong>Data Rayon</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
@section('content')
  <form class="" method="post">{{csrf_field()}}
  Name : <input type="text" name="nama" value="{{$user->nama}}" required=""><br>
  Phone : <input type="tel" name="telp" value="{{$user->telp}}" required=""><br>
  Birth Place : <input type="text" name="bop" value="{{$user->bop}}" required=""><br>
  Birth Date : <input type="date" name="bod" value="{{$user->bod}}" required=""><br>
  Address : <textarea name="alamat" rows="8" cols="80">{{$user->alamat}}</textarea><br>
  <input type="submit" name="submit" value="SUBMIT">
  </form>
@endsection
