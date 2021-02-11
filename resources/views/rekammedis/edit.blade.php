@extends('layouts.master')
@section('content')

@if(session('sukses'))
         <div class= "alert alert-success" role="alert">
                {{session('sukses')}}
        </div>
        @endif
<!-- Content Header (Page header) -->  
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Data Rekam Medis</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->     
<section class="content">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <form action="/Rekammedis/{{$data_rekam->id_pemeriksaan}}/update" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label @error('keluhan')
                            class="text-danger"
                            @enderror>Anamnesa @error('keluhan')
                            | {{$message}}
                            @enderror</label>
                            <input name="keluhan" type="text" class="form-control" placeholder="Anamnesa" value="{{$data_rekam->keluhan}}" >
                        </div>
                        <div class="form-group">
                            <label @error('tekanan_darah')
                            class="text-danger"
                            @enderror>Tekanan Darah @error('tekanan_darah')
                            | {{$message}}
                            @enderror</label>
                            <input name="tekanan_darah" type="text" class="form-control" placeholder="Diagnosa" value="{{$data_rekam->tekanan_darah}}" >
                        </div>
                            

                        <div class="form-group">
                            <label @error('id_penyakit')
                            class="text-danger"
                            @enderror>Diagnosa @error('id_penyakit')
                            | {{$message}}
                            @enderror</label>
                            @foreach($data_penyakit as $penyakit)
                            <br>
                            <div class="form-check form-check-inline">
                            <input name="id_penyakit[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$penyakit->id_penyakit}}">
                            <label class="form-check-label" for="inlineCheckbox1">{{$penyakit->nama_penyakit}}</label>
                          </div>
                         @endforeach
                        </div>
                        <div class="form-group">
                            <label @error('id_obat')
                            class="text-danger"
                            @enderror>Obat @error('id_obat')
                            | {{$message}}
                            @enderror</label>
                            
                         @foreach($db_obat as $obat)
                            <br>
                            <div class="form-check form-check-inline">
                            <input name="id_obat[]" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="{{$obat->id_obat}}">
                            <label class="form-check-label" for="inlineCheckbox2">{{$obat->nama_obat}}</label>
                          </div>
                         @endforeach
                        </div>
                        <div class="form-group">
                            <label @error('jumlah_obat')
                            class="text-danger"
                            @enderror>Jumlah @error('jumlah_obat')
                            | {{$message}}
                            @enderror</label>
                            <input name="jumlah_obat" type="text" class="form-control" id="jumlah_obat" placeholder="Jumlah"  >
                        </div>
                        <div class="form-group">
                            <label @error('petunjuk')
                            class="text-danger"
                            @enderror>Petunjuk @error('petunjuk')
                            | {{$message}}
                            @enderror</label>
                            <input name="petunjuk" type="text" class="form-control" id="petunjuk" placeholder="Petunjuk Obat"  >
                        </div>
                        <div class="form-group">
                            <label @error('id_layanan_tambahan')
                            class="text-danger"
                            @enderror>Layanan Tambahan @error('id_layanan_tambahan')
                            | {{$message}}
                            @enderror</label>
                                 
                         @foreach($db_layanan as $layanan)
                            <br>
                            <div class="form-check form-check-inline">
                            <input name="id_layanan_tambahan[]" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="{{$layanan->id_layanan_tambahan}}">
                            <label class="form-check-label" for="inlineCheckbox3">{{$layanan->nama_layanan_tambahan}}</label>
                          </div>
                         @endforeach

                        </div>
                        <div class="form-group">
                            <label @error('nilai')
                            class="text-danger"
                            @enderror>Nilai Layanan Tambahan @error('nilai')
                            | {{$message}}
                            @enderror</label>
                            <input name="nilai" type="text" class="form-control" id="nilai" placeholder="Nilai"  >
                        </div>
                        <div class="form-group">
                            <label>Tambahan</label>
                            <input name="tambahan" type="text" class="form-control" id="tambahan" placeholder="tambahan" value="{{$data_rekam->tambahan}}" >
                        </div>
                        <div class="form-group">
                            <label @error('total_biaya')
                            class="text-danger"
                            @enderror>Total Biaya @error('total_biaya')
                            | {{$message}}
                            @enderror</label>
                            <input name="total_biaya" type="number" class="form-control" id="total_biaya" placeholder="Total Biaya" value="{{$data_rekam->total_biaya}}">
                        </div>
                        <div class="form-group">
                            <label @error('tanggal_pemeriksaan')
                            class="text-danger"
                            @enderror>Tanggal Pemeriksaan @error('tanggal_pemeriksaan')
                            | {{$message}}
                            @enderror</label>
                            <input name="tanggal_pemeriksaan" type="date" class="form-control" id="tanggal_pemeriksaan" placeholder="Tanggal Pemeriksaan" value="{{$data_rekam->tanggal_pemeriksaan}}" >
                        </div>            
                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/rekammedis" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
            </div>
            </div>
@stop
