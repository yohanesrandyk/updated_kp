@extends('layout.wrapper')
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
