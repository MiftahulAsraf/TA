
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
  
         <h1 align="center"><u>Nota Pembayaran</u></h1>     
         <h3 align="center">Tanggal: {{$data_rekam->tanggal_pemeriksaan}}</h3>    <br /> <br />
         <br>
          <br /> <br />
         
         <table width="100%">
            <tr> 
               <td width="20%"><b>Dokter</td>
               <td width="20%"><b>{{$data_rekam->pasien->user->nama_user}}</td>
               <td width="20%"><b>Invoice : {{$data_rekam->id_pemeriksaan}} </td>
              </tr>
              <tr> 
                <td>{{$data_rekam->id_dokter}}</td>
                <td>Umur : {{$data_rekam->pasien->umur}}</td>
                <td>ID Pasien : {{$data_rekam->id_pasien}}</td>
              </tr>
              <tr> 
                <td></td>
                <td>Alamat : {{$data_rekam->pasien->alamat}}</td>
                <td></td>

              </tr>
         </table>
         <br/>
               <table width="100%" class="tabel-common">
                  <tr>
                     <td ><b>Obat</td>
                     <td>
                     @foreach($data_rekam->TransaksiObat as $obat)
                            <b>{{$obat->Obat->nama_obat}}</b>({{$obat->jumlah_obat}}) petunjuk : {{$obat->petunjuk}},
                    @endforeach
                       </td>
                      </tr>
                     
                      <tr>
                        <td ><b>Layanan Tambahan</td>
                        
                        <td>
                        @foreach($data_rekam->DetailLayananTambahan as $layanan)
                                <b>{{$layanan->LayananTambahan->nama_layanan_tambahan}}</b> : {{$layanan->nilai}},
                        @endforeach
                        </td>
                      </tr>
               
                  
               </table>
         <br />
         <table width="100%"  class='tabel-info'>
            <tr> 
               <td width="20%">Tambahan</td>
               <td>: {{$data_rekam->tambahan}}</td>
            </tr>
         
            


         </table>
         <table width="100%"  class='tabel-info'>
            <tr>
              <br>
           <td width="20%">Subtotal:</th>
           <td >{{$data_rekam->total_biaya}}</td>
         </tr>
         
            


         </table>
         <table align="left" style="text-align: center;">
                    <tr>
                        <td width="350px"></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Perbaungan, {{ $now }} <br><br><br><br>


                            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;<strong>Petugas</strong>
                        </td>
                    </tr>
                </table>
   </div>
            </div>
      </body>
   </html>
