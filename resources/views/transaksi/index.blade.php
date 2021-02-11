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
          <h1 class="m-0 text-dark">Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/transaksi">Transaksi</a></li>
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
              <h3 class="card-title">Data Transaksi Hari Ini</h3>
</div>
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>

                            <th>Tanggal Pemeriksaan</th>
                            <th>ID Pemeriksaan</th>
                            <th>Nama</th>
                            <th>Obat</th>
                            <th>Total Biaya</th>
                            <!-- @if(Auth::user()->id_role == 1) -->
                            <th>Aksi</th>
                            <!-- @endif -->
                        </tr>
                        @foreach($data_hari as $rekam)
                        <tr>
                            <td>{{$rekam->tanggal_pemeriksaan}}</td>
                            <td>{{$rekam->id_pemeriksaan}}</td>
                            <td>{{$rekam->pasien->user->nama_user}}</td>
                            <td>@foreach($rekam->TransaksiObat as $obat)
                              {{$obat->Obat->nama_obat}}({{$obat->jumlah_obat}}),
                            @endforeach</td>
                            <td>{{$rekam->total_biaya}}</td>
                            <td>
                            <!-- @if(Auth::user()->id_role == 1) -->
                            <a href="/transaksi/{{$rekam->id_pemeriksaan}}/invoice" class="btn btn-warning btn-sm">Print</a>
                           <!-- @endif -->
                            </td>
                            </tr>
                            
                        @endforeach
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

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">    
        <div class="row">
          <div class="col-md-12">
          <div class="card"> 
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Transaksi</h3>
</div>
                <div class="card-body">
                <table class="display" id="tbtransaksi">
                <thead>
                        <tr>

                            <th scope="col">Tanggal Pemeriksaan</th>
                            <th scope="col">ID Pemeriksaan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Obat</th>
                            <th scope="col">Total Biaya</th>
                            
                            <th scope="col">Aksi</th>
                            
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
                            <td>
                            @if(Auth::user()->id_role == 1)
                            <a href="/transaksi/{{$rekam->id_pemeriksaan}}/invoice" class="btn btn-warning btn-sm">Print</a>
                           @endif
                            </td>
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
    $('#tbtransaksi').DataTable();
} );

</script>

@endsection