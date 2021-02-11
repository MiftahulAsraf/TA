@extends('layouts.master')
@section('content')

  

@if(session('sukses'))
<div class="alert alert-success" role="alert">
      {{session('sukses')}}
</div>
@endif

<!-- Content Header (Page header) -->  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Rekam Medis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/rekammedis">Rekam Medis</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->


<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">    
        <div class="row">
          <div class="col-md-12">
          <div class="card"> 
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Rekam Medis</h3>
</div>
                <div class="card-body">
                <table class="display" id="tbrekap">
  <thead>
    <tr>
      <th scope="col">No Rekam Medis</th>
      <th scope="col">Nama</th>
      <th scope="col">Umur</th>
      <th scope="col">Anamnesa</th>
      <th scope="col">Diagnosa</th>
      <th scope="col">Tekanan Darah</th>
      <th scope="col">Terapi</th>
      <th scope="col">Layanan Tambahan</th>
      <th scope="col">Alamat</th>
      <th scope="col">Alergi Obat</th>
      <th scope="col">Status</th>
      <th scope="col">Tanggal Pemeriksaan</th>
      <th scope="col">Dokter</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data_rekam as $rekam)
    <tr>
      <td>{{$rekam->pasien->no_rekammedis}}</td>
      <td>{{$rekam->pasien->user->nama_user}}</td>
      <td>{{$rekam->pasien->umur}}</td>
      <td>{{$rekam->keluhan}}</td>
      <td>
                            @foreach($rekam->penyakit as $penyakit)
                            {{$penyakit->nama_penyakit}} ,
                            @endforeach
                            </td>
                            <td>{{$rekam->tekanan_darah}}</td>
                            <td>
                            @foreach($rekam->TransaksiObat as $obat)
                            <b>{{$obat->Obat->nama_obat}}</b>({{$obat->jumlah_obat}}) petunjuk : {{$obat->petunjuk}},
                            @endforeach
                            </td>
                            <td>
                            @foreach($rekam->DetailLayananTambahan as $layanan)
                             <b>{{$layanan->LayananTambahan->nama_layanan_tambahan}}</b> : {{$layanan->nilai}},
                            @endforeach
                            </td>
                            <td>{{$rekam->pasien->alamat}}</td>
                            <td>{{$rekam->pasien->note}}</td>
                            <td>{{$rekam->status}}</td>
                            <td>{{$rekam->tanggal_pemeriksaan}}</td>
                            <td>{{$rekam->dokter->nama_user}}</td>
    </tr>
    @endforeach
  </tbody>
</table>          
                </div>   
                
</div>   

                <div class="card-footer">
                <div class="row mb-2">
                   <div class="col-12">
                    </div>
                    
                </div>
                
                <!-- /.row -->
                </div>


                
                
                              <!-- /.card-body -->

                              <!-- /.        
                              
                              <div class="card-footer">
                                
                              </div>
                              
                              card-footer-->

  </div><!-- /.container-fluid -->
</section><!-- Main content -->

@stop           

@section('mscript')
<script>

$(document).ready(function() {
    $('#tbrekap').DataTable();
} );

</script>

@endsection