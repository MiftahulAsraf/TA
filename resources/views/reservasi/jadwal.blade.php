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
          <h1 class="m-0 text-dark">Jadwal Klinik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/jadwal">Jadwal</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

  <!-- Main content -->

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Jadwal Klinik Hari Ini</h3>
</div>   
                <div class="card-body">
                <table class="display" id="tbriw">
  <thead>
                        <tr>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Nama Layanan</th>
                            <th>Status</th>
                          
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_waktu as $reservasi)
                        <tr>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            
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
    $('#tbriw').DataTable();
} );
</script>

@endsection
