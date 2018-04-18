<?php
    $record=explode(';', $r->isi);
    $tglkeluar=explode('/', $r->tgl_keluar);
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIM |  PKL</title>
    <link href="{{asset('css/bootstrap.min.css')}} "rel="stylesheet">
  </head>
  <body onload="window.print();window.close();">
	<div class="container">
	<div class="row" align="center">
		<b><u>SURAT TUGAS</u></b><br>
		<b>No : 421.5/{{$r->nomersurat}}/SMK Wikrama/{{$romawi}}/{{$tglkeluar[2]}}</b>
	</div>
	<div class="row" align="justify">
		Kepala SMK Wikrama Bogor, dengan ini memberikan tugas kepada :<br><br>
		<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td>{{$pemb->nama}}</td>
		</tr>
		<tr>
			<td>No. Pegawai&nbsp&nbsp</td>
			<td>:&nbsp&nbsp</td>
			<td>{{$pemb->nopeg}}</td>
		</tr>
		</table><br>
		Sebagai pembimbing peserta Praktik Kerja Lapangan (PKL) Tahun Pelajaran 2017/2018 bertempat di:<br><br>
		<table>
		<tr>
			<td>Nama Dunia Usaha/Dunia Industri&nbsp</td>
			<td>:</td>
			<td>{{$r->getPerusahaan->perusahaan}}</td>
		</tr>
		<tr>
			<td>Alamat&nbsp&nbsp</td>
			<td>:&nbsp&nbsp</td>
			<td>{{$r->getPerusahaan->alamat." ".$r->getPerusahaan->kota}}</td>
		</tr>
		<tr>
			<td>Contact Person&nbsp</td>
			<td>:&nbsp</td>
			<td>{{$r->getPerusahaan->telp}}</td>
		</tr>
		</table><br>
		Demikian surat tugas ini disampaikan, agar dapat digunakan sebagaimana mestinya dan berlaku selama pelaksanaan Praktik Kerja Lapangan (PKL).
	</div>
	<div class="row">
		<div class="col-md-offset-7 col-md-5">
			<br>
			<div>Bogor, {{$tglkeluar[0]." ".$namabulan." ".$tglkeluar[2]}}</div>
			<div>Kepala SMK Wikrama Bogor</div>
			<br><br><br><br>
			<div><b>{{$record[2]}}</b></div>
		</div>
	</div>
</div>
  </body>
</html>
