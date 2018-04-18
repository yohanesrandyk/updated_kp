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
                    <th rowspan="2">Hari Ke-</th>
                    <th colspan="2">Hari/Tanggal</th>
                    <th rowspan="2">Paraf</th>
                    <th rowspan="2">Keterangan</th>
                  </tr>
                  <tr>
                    <th>Datang</th>
                    <th>Pulang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kehadiran as $data)
                    <tr>
                      <td>{{$data->id_kehadiran}}</td>
                      <td>{{$data->datang}}</td>
                      <td>{{$data->pulang}}</td>
                      <td>@if ($data->paraf == "0") Tidak @else Ya @endif</td>
                      <td>{{$data->ket}}</td>
                      {{-- <td><input type="checkbox" name="" value="" @if ($data->paraf == "1") checked readonly @endif></td> --}}
                    </tr>
                  @endforeach
                </tbody>
              </table>
</body>
</html>
