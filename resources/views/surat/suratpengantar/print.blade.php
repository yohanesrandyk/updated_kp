<?php
    $record=explode(';', $r->isi);
    $tglkeluar=explode('/', $r->tgl_keluar);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Surat Pengantar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">

</head>
<body onload="window.print();window.close();">
<div class="container" style="margin-top: 1cm; margin-left: 1.5cm; margin-right: 1.5cm; font-style: arial; font-size: 12pt;">
	<table>
		<tr>
			<td width="390"></td>
			<td>
			<div><b>{{$tglkeluar[0]." ".$namabulan." ".$tglkeluar[2]}}</b></div><br>
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td width="390">
				<table>
					<tr>
						<td>No</td>
						<td>&nbsp :</td>
						<td>&nbsp 423.5/{{$r->nomersurat}}/SMK Wikrama/{{$romawi}}/{{$tglkeluar[2]}}</td>
					</tr>
					<tr>
						<td>Hal</td>
						<td>&nbsp :</td>
						<td>&nbsp Daftar nama siswa Praktik Kerja Lapangan (PKL)</td>
					</tr>
					<tr>
						<td>Sifat</td>
						<td>&nbsp :</td>
						<td>&nbsp Penting</td>
					</tr>
				</table>
			</td>
			<td>
        <div>Kepada</div>
        <table>
          <tr>
            <td style="padding-left: 0px;">Yth.&nbsp</td>
            <td>Pimpinan<td>
          </tr>
          <tr>
            <td></td>
            <td>{{$r->getPerusahaan->perusahaan}}</td>
          </tr>
          <tr>
            <td></td>
            <td>{{$r->getPerusahaan->alamat}}</td>
          </tr>
          <tr>
            <td></td>
            <td>{{$r->getPerusahaan->kota}}</td>
          </tr>
        </table>
			</td>
		</tr>
	</table>

	<br>
		<div style="padding-left: 50px; " class="col-md-12">Dengan hormat,</div>
		<div style="padding-left: 50px; padding-right: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
			Dengan ini kami sampaikan daftar nama siswa SMK Wikrama Bogor yang akan melaksanakan Praktik Kerja Lapangan (PKL) di perusahaan yang Bapak/Ibu pimpin yaitu:
		</div>
		<br>
		<div style="padding-left: 50px; padding-right: 50px; padding-right: 50px; text-align: justify;" class=" col-md-12">
			<table border="1">
				<tr>
					<th>NO.</th>
					<th>NIS</th>
					<th>NAMA</th>
					<th>KELAS</th>
					<th>PAKET KEAHLIAN</th>
				</tr>
        <?php $no=1 ?>
        @foreach($siswa as $data)
				<tr>
					<td><?php echo $no++ ?></td>
					<td>{{$data->nis}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->rombel}}</td>
					<td>{{$data->jurusan}}</td>
				</tr>
        @endforeach
			</table>
		</div>
		<br>
		<div style="padding-left: 50px; padding-right: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
			Adapun pelaksanaan Praktik Kerja Lapangan (PKL) akan dilaksanakan pada {{$record[0]}} s.d. {{$record[1]}},</b> dan setiap siswa diwajibkan membuat laporan yang disetujui dan disahkan oleh instansi/perusahaan yang Bapak/Ibu pimpin pada akhir kegiatan tersebut.
		</div>
		<br>
		<div style="padding-left: 50px; padding-right: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
			Demikian surat ini kami sampaikan, atas perhatian dan kerjasama Bapak/Ibu kami ucapkan terima kasih.
		</div>
		<br>
		<table>
			<tr>
				<td width="390"></td>
				<td><br><br>
			<div>Hormat kami,</div>
			<div>Kepala SMK Wikrama Bogor</div>
			<br><br><br><br>
			<div>{{$record[2]}}</div></td>
			</tr>
		</table>
</div>
</div>
</body>
</html>
