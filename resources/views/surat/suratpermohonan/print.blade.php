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
    <div class="container" style="font:tahoma; margin-top: 1cm; margin-right:2cm; margin-left:1cm;">
    <div class="head">
        <!-- <div class="row">
            <div class="col-md-offset-7 col-md-5">

            </div>
        </div> -->
        <div class="row">
          <table style="margin-left:50px;">
            <tr>
              <td width="600">
              </td>
              <td>
                <div>{{$tglkeluar[0]." ".$namabulan." ".$tglkeluar[2]}}</div>
                <br>
                <div>Kepada</div>
              </td>
            </tr>
            <tr>
              <td width="600">
                <table>
                    <tr>
                        <td>No</td>
                        <td>&nbsp :</td>
                        <td>&nbsp 423.5/{{$r->nomersurat}}/SMK Wikrama/{{$romawi}}/{{$tglkeluar[2]}}</td>
                    </tr>
                    <tr>
                        <td>Lamp</td>
                        <td>&nbsp :</td>
                        <td>&nbsp 2 (dua) lembar</td>
                    </tr>
                    <tr>
                        <td>Hal</td>
                        <td>&nbsp :</td>
                        <td>&nbsp Permohonan Praktik Kerja Lapangan (PKL)</td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td>&nbsp :</td>
                        <td>&nbsp Penting</td>
                    </tr>
                </table>
              </td>
                <td>
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
            <!-- <div class="col-md-6">

            </div>
            <div class="col-md-6">
            </div> -->
        </div>
    </div>
    <br>
        <div style="padding-left: 50px" class="col-md-12">Dengan hormat,</div>
        <div style="padding-left: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
            Kami SMK Wikrama Bogor merupakan salah satu Sekolah Menengah  Kejuruan dengan paket keahlian
            @foreach($jurusan as $rj)
                {{$rj->jurusan}},
            @endforeach
            di bawah naungan Yayasan Prawitama yang berdiri sejak tahun 1996. Status Akreditasi A kami raih pada tahun 2015 dan berbagai prestasi akademik dan non akademik telah kami raih, antara lain telah meraih juara 1 pada Lomba Keterampilan Siswa tingkat Kota Bogor, juara 1 pada Olimpiade Olahraga Siswa Nasional tingkat Kota Bogor, meraih medali emas lomba Indonesia Science Project Olympiad bidang Komputer tahun 2015, juara 3 Film Pendek pada Festival Lomba Seni Siswa Nasional tingkat Nasional 2016, pemenang Cyberpreneur Competition Kategori Desain Website Statis tingkat Nasional  tahun 2015, <i>as the 1st Winner of the 2015 SEAMEO Song Angklung Contest</i>, memiliki lisensi Lembaga Sertifikasi Profesi Pihak 1 (LSP P1) dan lulusan dibekali dengan sertifikasi internasional.


        </div>
        <br>
        <div style="padding-left: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
            Berkenaan dengan kurikulum pendidikan SMK yang mewajibkan siswa Sekolah Menengah Kejuruan untuk melaksanakan Praktik Kerja Lapangan (PKL) di berbagai instansi yang bertujuan untuk menambah wawasan dan pengetahuan pembelajaran siswa, maka kami mohon kesediaan Bapak/Ibu untuk memberi kesempatan kepada siswa-siswi kami paket keahlian @foreach($jurusan as $rj)
                {{$rj->jurusan}},
            @endforeach untuk melaksanakan Praktik Kerja Lapangan (PKL) di instansi yang Bapak/Ibu pimpin dengan mengisi form kesediaan penerimaan siswa Praktik Kerja Lapangan (PKL) (terlampir).
        </div>
        <div style="padding-left: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
            Adapun pelaksanaan Praktik Kerja Lapangan (PKL) tersebut kami rencanakan selama {{$record[0]." minggu"}} yang dimulai pada {{$record[1]." s.d ".$record[2]." ".$record[3]}} dengan mengikuti jam kerja industri/instansi yang Bapak/Ibu pimpin.
        </div>
        <div style="padding-left: 50px; text-align: justify; text-indent: 0.5in;" class=" col-md-12">
            Demikian surat permohonan ini kami sampaikan, jawaban kesediaan dari Bapak/Ibu dapat menghubungi {{$record[4]}}, HP. {{$record[5]}}, email: {{$record[6]}}</b>. Atas perhatian dan kerjasama yang baik kami ucapkan terima kasih.
        </div>
    <div class="row">
      <table style="margin-left:50px;">
        <tr>
          <td width="600">
          </td>
          <td>
            <br>
            <div>Hormat kami,</div>
            <div>Kepala SMK Wikrama Bogor</div>
            <br><br><br><br>
            <div><b>{{$record[7]}}</b></div>
          </td>
        </tr>
      </table>
    </div>
</div>
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
  </body>
</html>
