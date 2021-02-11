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
            <li class="breadcrumb-item"><a href="/akun">Edit</a></li>
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
                <form action="/akun/{{$pasien->id_pasien}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label <label @error('nama_user')
                            class="text-danger"
                            @enderror>Nama @error('nama_user')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_user" type="text" class="form-control" placeholder="Nama user" value="{{Auth::User()->nama_user}}" >
                        </div>
                        <div class="form-group">
                            <label @error('umur')
                            class="text-danger"
                            @enderror>Umur @error('umur')
                            | {{$message}}
                            @enderror</label>
                            <input name="umur" type="number" class="form-control" placeholder="Umur" value="{{Auth::user()->pasien->umur}}" >
                        </div>
                            <label @error('jenis_kelamin')
                            class="text-danger"
                            @enderror>Jenis Kelamin @error('jenis_kelamin')
                            | {{$message}}
                            @enderror</label>
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
                            <input name="nomor_telp" type="text" class="form-control" placeholder="Nomor Telepon" value="{{Auth::user()->pasien->nomor_telp}}">
                        </div>
                        <div class="form-group">
                        <label @error('alamat')
                            class="text-danger"
                            @enderror>Alamat @error('alamat')
                            | {{$message}}
                            @enderror</label>
                            <textarea name=alamat class="form-control" placeholder="Alamat" rows="3" >{{Auth::user()->pasien->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNote1">Note</label>
                            <input name="note" type="text" class="form-control" placeholder="Note" value="{{Auth::user()->pasien->note}}" >
                        </div>   
                        <div class="form-group">
                            <label >Foto </label>
                            <input name="foto" type="file" class="form-control" placeholder="Foto" value="" >
                        </div>
                        <div class="form-group">
                            <label @error('password')
                            class="text-danger"
                            @enderror>password @error('password')
                            | {{$message}}
                            @enderror</label>
                            <input name="password" type="text" class="form-control" placeholder="Password" value="" >
                        </div> 
                        <div class="form-group">

                        
                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/akun" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
@stop
