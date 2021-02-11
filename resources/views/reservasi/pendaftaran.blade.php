@extends('layouts.master')
@section('content')
@if(session('sukses'))
<div class="alert alert-success" role="alert">
      {{session('sukses')}}
</div>
@elseif(session('gagal'))
<div class="alert alert-danger" role="alert">
      {{session('gagal')}}
</div>
@endif
<!-- Content Header (Page header) -->  
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">pendaftaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/pendaftaran">pendaftaran</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->
<section class="content">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Pendaftaran pendaftaran</h3>
</div>
            <form action="/pendaftaran/create" method="POST">
            {{csrf_field()}}
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputNamaBelakang1">ID Reservasi</label>
                <input name="id_reservasi" type="text" class="form-control" placeholder="ID User" value="<?php echo "RSV".Rand(10,10000) ?>" readonly >

            </div>
            <div class="form-group">
                            <label @error('id_pasien')
                            class="text-danger"
                            @enderror>Pasien @error('id_pasien')
                            | {{$message}}
                            @enderror</label>
                            <select name="id_pasien" class="form-control" placeholder="Jenis Kelamin" value="{{old('jenis_kelamin')}}">
                            @foreach($data_pasien as $pasien)
                            <option value="{{$pasien->id_pasien}}">{{$pasien->user->nama_user}}</option>  
                                @endforeach
                            </select>
            </div>
            <div class="form-group">
                <label @error('tanggal_reservasi')
                            class="text-danger"
                            @enderror>Tanggal @error('tanggal_reservasi')
                            | {{$message}}
                            @enderror</label>
                <input name="tanggal_reservasi" type="date" class="form-control" placeholder="tanggal">
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="id_layanan" value="LYN01" checked>
              <label class="form-check-label form-check-inline" >
              Pendaftaran
              </label>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"></label>
                            <select name="id_waktu_booking" class="form-control" placeholder="ID Layanan">
                                @foreach($layanan_booking as $waktu) 
                            <option value="{{$waktu->id_waktu}}">{{$waktu->waktu_mulai}} ---- {{$waktu->waktu_selesai}}</option>                       
                                @endforeach
                            </select>
            </div>

              

                <button type="submit" class="btn btn-primary btn-lg btn-block">Pesan</button>
                <a class="btn btn-warning btn-block" href="/reservasi" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            </form>


</div>
</div>
                </div>
               
            </div>
            </div>

@endsection