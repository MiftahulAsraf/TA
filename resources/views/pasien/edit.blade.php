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
          <h1 class="m-0 text-dark">Edit Data Pasien</h1>
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
                <form action="/pasien/{{$pasien->id_pasien}}/update" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label @error('nama_user')
                            class="text-danger"
                            @enderror>Nama @error('nama_user')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_user" type="text" class="form-control" placeholder="Nama user" value="{{$pasien->user->nama_user}}" >
                        </div>
                        <div class="form-group">
                            <label @error('umur')
                            class="text-danger"
                            @enderror>Umur @error('umur')
                            | {{$message}}
                            @enderror</label>
                            <input name="umur" type="number" class="form-control" placeholder="Umur" value="{{$pasien->umur}}" >
                        </div>
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin">
                                <option value="L" @if($pasien->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                <option value="P" @if($pasien->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                               
                            </select>
                        <div class="form-group">
                            <label @error('nomor_telp')
                            class="text-danger"
                            @enderror>Nomor Telepon @error('nomor_telp')
                            | {{$message}}
                            @enderror</label>
                            <input name="nomor_telp" type="text" class="form-control" placeholder="Nomor Telepon" value="{{$pasien->nomor_telp}}">
                        </div>
                        <div class="form-group">
                            <label @error('alamat')
                            class="text-danger"
                            @enderror>Alamat @error('alamat')
                            | {{$message}}
                            @enderror</label>
                            <textarea name=alamat class="form-control" placeholder="Alamat" rows="3" >{{$pasien->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNote1">Note</label>
                            <input name="note" type="text" class="form-control" placeholder="Note" value="{{$pasien->note}}" >
                        </div>   
                        
                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/pasien" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
            </div>
            </div>
@stop
