@extends('layouts.master')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="container-fluid">
    <div class="row">
    @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $disetujui->count('id_reservasi') }}</h3>

                <p>Reservasi Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/konfirmasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         @endif
          <!-- ./col -->
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $data_pasien->count('id_pasien') }}</h3>

                <p>Jumlah Pasien</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/pasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
           <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $dbrek->count('dbrek') }}</h3>

                <p>Siap Periksa</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/rekammedis" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          @if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
          <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total->sum('total_biaya') }}</h3>

                <p>Total Pemasukkan Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/laporan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
@endif
            @if(Auth::user()->id_role == 3)
            <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $riwayatres->count('id_reservasi') }}</h3>

                <p>Riwayat Reservasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/pasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          @if(Auth::user()->id_role == 3)
            <div class="col-lg-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3> {{ $riwayat->count('id_pemeriksaan') }}</h3>

                <p>Riwayat Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/pasien" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endif
          
          <!-- ./col -->
        </div>
        </div>
        
          </div>
@endsection