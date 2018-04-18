<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>

</head>
<body onload="window.print();window.close();">
<table>
                <thead>
                  <tr>
                    <th rowspan="2">Divisi</th>
                    <th rowspan="2">Tanggal</th>
                    <th colspan="2">Waktu</th>
                    <th rowspan="2">Kegiatan Yang Dilakukan</th>
                    <th rowspan="2">Hasil yang Dicapai</th>
                    <th rowspan="2">Keterangan Kegiatan</th>
                    <th rowspan="2">Paraf</th>
                  </tr>
                  <tr>
                    <th>Mulai</th>
                    <th>Selesai</th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($jurnal)>0)
                    @foreach ($jurnal as $data)
                      <tr>
                        <td>{{$data->divisi}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->mulai}}</td>
                        <td>{{$data->selesai}}</td>
                        <td>{{$data->bentuk_kegiatan}}</td>
                        <td>{{$data->hasil_pencapaian}}</td>
                        <td>{{$data->ket}}</td>
                        <td>@if ($data->paraf == "0") Tidak @else Ya @endif</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
</body>
</html>
