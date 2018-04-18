@extends('layout.wrapper')
@section('breadcrumb')

      <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-10">
              <h2>Form Penempatan Siswa</h2>
              <ol class="breadcrumb">
                  <li>
                      <a href="{{url('/')}}">Home</a>
                  </li>
                  <li>
                      <a href="{{url('/penempatan')}}">Data Penempatan Siswa</a>
                  </li>
                  <li class="active">
                      <strong>Form Penempatan Siswa</strong>
                  </li>
              </ol>
          </div>
          <div class="col-lg-2">
          </div>
      </div>

    @endsection
@section('content')
<div class="col-lg-12"><div class="ibox">
  <div class="ibox-content">


                            <div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                    <tr>
                                        <td width="90">
                                            <div class="cart-product-imitation">
                                            </div>
                                        </td>
                                        <td class="desc">
                                            <h3>
                                            <a href="#" class="text-navy">
                                                {{$thisperusahaan->perusahaan}}
                                            </a>
                                            </h3>
                                            <p class="small">
                                                Perusahaan yang terletak di {{$thisperusahaan->alamat}}
                                            </p>
                                            <dl class="small m-b-none">
                                                <dt>Bidang Perusahaan</dt>
                                                <dd>{{$bidang->bidangperusahaan}}</dd>
                                            </dl>

                                            <div class="m-t-sm">
                                                <a target="_blank" href="http://{{url($thisperusahaan->website)}}"><i class="fa fa-external-link"></i>{{$thisperusahaan->website}}</a>
                                            </div>
                                        </td>

                                        <td colspan="3">
                                            <!-- <strong>Siswa Terverifikasi : </strong>3 -->
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
</div></div>
<div class="col-lg-12">
  <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Tabel Data Siswa</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
                </a>
              </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables-example" >
  <thead>
    <th>NIS</th>
    <th>Nama</th>
    <th>Rayon</th>
    <th>Opsi</th>
  </thead>
  <tbody>
    <script type="text/javascript">
      let arr_quo = [];
      let arr_tmp = [];
    </script>
    @foreach ($siswa_quo as $data)
      <tr class="row_quo" onclick="document.getElementById('quo{{$data->id}}').click();">
        <td>{{$data->nis}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->rayon}}</td>
        <td>
        <div class="checkbox checkbox-success" onclick="document.getElementById('quo{{$data->id}}').click();">
          <input id="quo{{$data->id}}" type="checkbox" name="" value="" onclick="
            if(document.getElementById('quo{{$data->id}}').checked == true){arr_quo.push({{$data->id}});}
            else{arr_quo.splice(arr_quo.indexOf({{$data->id}}), 1);};"><label></label>
        </div></td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="checkbox m-r-xs"><input type="checkbox" id="checkbox1" onclick="check_quo()"><label for="checkbox1">
Pilih semua</label></div>
</div>
<button type="button" name="button" class="btn btn-primary" onclick="
  $('#siswa').val(arr_quo);
  $('#perusahaan').val('{{$thisperusahaan->id_perusahaan}}');
  $('#status').val('0');
  document.getElementById('submit').click();
">Simpan</button>

</div>
</div>
</div>
<div class="col-lg-12">
  <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h5>Tabel Data Siswa Pending</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
                </a>
              </div>
      </div>
      <div class="ibox-content">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables-example" >
  <thead>
    <tr>
      <th>NIS</th>
      <th>Nama</th>
      <th>Rayon</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    @if (count($siswa_tmp) > 0)
      @foreach ($siswa_tmp as $data)
        <tr class="row_tmp" onclick="document.getElementById('tmp{{$data->id}}').click();">
          <td>{{$data->nis}}</td>
          <td>{{$data->nama}}</td>
          <td>{{$data->rayon}}</td>
          <td><div class="checkbox checkbox-success" onclick="document.getElementById('tmp{{$data->id}}').click();">
            <input id="tmp{{$data->id}}" type="checkbox" name="" value="" onclick="
              if(document.getElementById('tmp{{$data->id}}').checked == true) {arr_tmp.push({{$data->id}});}
              else{arr_tmp.splice(arr_tmp.indexOf({{$data->id}}), 1);};"><label></label>
          </div></td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
<div class="checkbox m-r-xs"><input type="checkbox" id="checkbox2" onclick="check_tmp()"><label for="checkbox2">
Pilih semua</label></div>
</div>
<button type="button" name="button" class="btn btn-primary" onclick="
  $('#siswa').val(arr_tmp);
  $('#perusahaan').val('');
  $('#status').val('');
  document.getElementById('submit').click();
">Batal</button>
<button type="button" name="button" class="btn btn-primary" onclick="
  $('#siswa').val(arr_tmp);
  $('#perusahaan').val('{{$thisperusahaan->id_perusahaan}}');
  $('#status').val('1');
  document.getElementById('submit').click();
">Selesai</button>
</div>
</div>
</div>

<form class="" action="#" method="post" style="display:none;">{{csrf_field()}}
  <input type="text" id="siswa" name="siswa" value="">
  <input type="text" id="perusahaan" name="perusahaan" value="">
  <input type="text" id="status" name="status" value="">
  <input type="text" id="redirect" name="redirect" value="{{encrypt($thisperusahaan->id_perusahaan)}}">
  <input type="submit" id="submit" name="submit" value="">
</form>
<script type="text/javascript">
  function check_quo(){
    let row_quo = document.getElementsByClassName('row_quo');
    for (let i = 0; i < row_quo.length; i++) {
      row_quo[i].click();
    }
  }
  function check_tmp(){
    let row_tmp = document.getElementsByClassName('row_tmp');
    for (let i = 0; i < row_tmp.length; i++) {
      row_tmp[i].click();
    }
  }
</script>
@endsection
