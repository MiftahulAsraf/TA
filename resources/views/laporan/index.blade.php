@extends('layouts.master')
@section('content')

<!-- Content Header (Page header) -->  
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Laporan Keuangan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/laporan">Laporan Keuangan</a></li>
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
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                  
                    <form class="form-inline" method="get" action="/laporan/cetaklaporan">
                    <div class="form-group">
                            <label ></label>
                            
                            <input name="tanggal_pemeriksaan" type="month" class="form-control" id="tanggal_pemeriksaan" placeholder="Tanggal Pemeriksaan" >
                            <button class="btn btn-warning btn-sm" type="submit">Print</button>
                        </div>
                    </form>
              </nav>    
        <div class="row">
          <div class="col-md-12">
          <div class="card"> 
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Laporan Hari Ini</h3>
</div>
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>

                            <th>Tanggal Pemeriksaan</th>
                            <th>ID Pemeriksaan</th>
                            <th>Total Biaya</th>
                            
                        </tr>
                        @foreach($totalhari as $rekam)
                        <tr>
                            <td>{{$rekam->tanggal_pemeriksaan}}</td>
                            <td>{{$rekam->id_pemeriksaan}}</td>
                            <td>{{$rekam->total_biaya}}</td>

                            </tr>
                        @endforeach
                        <th>Pemasukkan :</th>
                        <td><b>Total</td>
                        <td>{{ $totalhari->sum('total_biaya') }}</td>
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
              <h3 class="card-title">Laporan Bulan Ini</h3>
</div>
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>

                            <th>Tanggal Pemeriksaan</th>
                            <th>ID Pemeriksaan</th>
                            <th>Total Biaya</th>
                            
                        </tr>
                        @foreach($data_rekam as $rekam)
                        <tr>
                            <td>{{$rekam->tanggal_pemeriksaan}}</td>
                            <td>{{$rekam->id_pemeriksaan}}</td>
                            <td>{{$rekam->total_biaya}}</td>

                            </tr>
                        @endforeach
                        <th>Pemasukkan :</th>
                        <td><b>Total</td>
                        <td>{{ $total->sum('total_biaya') }}</td>
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
              <h3 class="card-title">Laporan Keseluruhan</h3>
</div>
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>

                            <th>Tanggal Pemeriksaan</th>
                            <th>ID Pemeriksaan</th>
                            <th>Total Biaya</th>
                            
                        </tr>
                        @foreach($dbrek as $rekam)
                        <tr>
                            <td>{{$rekam->tanggal_pemeriksaan}}</td>
                            <td>{{$rekam->id_pemeriksaan}}</td>
                            <td>{{$rekam->total_biaya}}</td>

                            </tr>
                        @endforeach
                        <th>Pemasukkan :</th>
                        <td><b>Total</td>
                        <td>{{ $dbrek->sum('total_biaya') }}</td>
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
