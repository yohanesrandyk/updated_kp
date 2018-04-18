@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Data Persyaratan Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li class="active">
                      <strong>Data Persyaratan Siswa</strong>
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
            <h5>Tabel Data Persyaratan Siswa</h5>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Rayon</th>
                @if(Auth::user()->id_role==5)
                <th>Bantara</th>
                @endif
                @if(Auth::user()->id_role==4)
                <th>Nilai</th>
                @endif
                @if(Auth::user()->id_role==8)
                <th>Keuangan</th>
                @endif
                @if(Auth::user()->id_role==7)
                <th>Kesiswaan</th>
                @endif
                @if(Auth::user()->id_role==2)
                <th>CBT Produktif</th>
                <th>Kehadiran Pengayaan</th>
                <th>Uji Kelayakan</th>
                @endif
                @if(Auth::user()->id_role==6)
                <th>Perpustakaan</th>
                @endif
              </thead>
              <tbody>
                @foreach ($siswa as $data)
                  <tr>
                    <td>{{$data->nis}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->jurusan}}</td>
                    <td>{{$data->rayon}}</td>
                    @if(Auth::user()->id_role==5)
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('bantara');
                      document.getElementById('submit').click();
                    " @if ($data->bantara > 0) checked @endif><label></label></div>
                    </td>
                    @endif
                    @if(Auth::user()->id_role==4)
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('nilai');
                      document.getElementById('submit').click();
                    " @if ($data->nilai > 0) checked @endif><label></label></div>
                    </td>
                    @endif
                    @if(Auth::user()->id_role==8)
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('keuangan');
                      document.getElementById('submit').click();
                    " @if ($data->keuangan > 0) checked  @endif><label></label></div>
                    </td>
                    @endif
                    @if(Auth::user()->id_role==7)
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('kesiswaan');
                      document.getElementById('submit').click();
                    " @if ($data->kesiswaan > 0) checked  @endif><label></label></div>
                    </td>
                    @endif
                    @if(Auth::user()->id_role==2)
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('cbt_prod');
                      document.getElementById('submit').click();
                    " @if ($data->cbt_prod > 0) checked  @endif><label></label></div>
                    </td>
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('kehadiran_pengayaan_pkl');
                      document.getElementById('submit').click();
                    " @if ($data->kehadiran_pengayaan > 0) checked  @endif><label></label></div>
                    </td>
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('lulus_ujikelayakan');
                      document.getElementById('submit').click();
                    " @if ($data->ujikel > 0) checked  @endif><label></label></div>
                    </td>
                    @endif
                    @if(Auth::user()->id_role==6)
                    <td>
                      <div class="checkbox checkbox-success"><input type="checkbox" name="" onclick="
                      $('#nis').val({{$data->nis}});
                      $('#field').val('perpustakaan');
                      document.getElementById('submit').click();
                    " @if ($data->perpus > 0) checked  @endif><label></label></div>
                    </td>
                    @endif
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <form action="#" style="display: none" method="post">{{ csrf_field() }}
      <input type="text" name="nis" id="nis">
      <input type="text" name="field" id="field">
      <input type="submit" name="" id="submit">
    </form>
@endsection
