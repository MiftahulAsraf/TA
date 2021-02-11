
   <html>
      <head>
         <title>Cetak Klinik Seira</title>
         <link href="http://portal.unand.ac.id/css/a-portal-print.css" rel="stylesheet" type="text/css" title="Default" />
         <link href="http://portal.unand.ac.id/css/a-portal-media-print.css" rel="stylesheet" type="text/css" title="Default" />
      </head>
      <body  onLoad="window.print()">

            <div class="page">
   <div class="page-potrait">
      <div class="nobreak">
        <table border ="0" width="80%">

    
       <!--<td align="left"><h2>Kementerian Pendidikan dan Kebudayaan<br>Universitas Andalas</h2></td>-->
      <tr> 
               <td rowspan="2"><img src="../../adminlte/img/logobenar.png" width=40 height=45/></td>
         <td align="left"><h2> Klinik Seira </h2>
         <p>Jalan Kabupaten no.80 Kecamatan Perbaungan, Kelurahan Simpang Tiga Pekan, Kabupaten Serdang Bedagai, Sumatera Utara</p>
        </td>
			</tr>
             <td><hr></td>
			</tr>
         </table>
  
         <h1 align="center"><u>Laporan Keuangan</u></h1>     
         <h3 align="center">Bulan: </h3>    <br /> <br />
         <br>
          <br /> <br />
         

         <br/>
         <table width="100%" class="table table-bordered">
  <thead>
    <tr>
      <th style="text-align:left" scope="col">ID Pemeriksaan</th>
      <th style="text-align:left" scope="col">Tanggal Pemeriksaan</th>
      <th style="text-align:left" scope="col">Nama</th>
      <th style="text-align:left" scope="col">Obat</th>
      <th style="text-align:left" scope="col">Total Biaya</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data_rekam as $rekam)
    <tr>
                          <td>{{$rekam->tanggal_pemeriksaan}}</td>
                            <td>{{$rekam->id_pemeriksaan}}</td>
                            <td>{{$rekam->pasien->user->nama_user}}</td>
                            <td>@foreach($rekam->TransaksiObat as $obat)
                              {{$obat->Obat->nama_obat}}({{$obat->jumlah_obat}}),
                            @endforeach</td>
                            <td>{{$rekam->total_biaya}}</td>
    </tr>
    @endforeach

  </tbody>
</table>


         <br />
         <table width="100%"  class='tabel-info'>
            <tr>
              <br>
           <th width="20%">Total:</th>

         </tr>
         
         <tr>
         <th>  {{$rekam->sum('total_biaya')}}</td>
         </tr>
            


         </table>
         <table align="left" style="text-align: center;">
                    <tr>
                        <td width="350px"></td>
                        
                    </tr>
                </table>
   </div>
            </div>
      </body>
   </html>
