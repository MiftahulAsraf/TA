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
          <h1 class="m-0 text-dark">Edit Data Obat</h1>
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
             <form action="/obat/{{$obat->id_obat}}/update" method="POST">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleInputNamaDepan1">ID Obat</label>
                            <input name="id_obat" type="text" class="form-control" placeholder="ID Obat" value="{{$obat->id_obat}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_obat')
                            class="text-danger"
                            @enderror>Nama Obat @error('nama_obat')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_obat" type="text" class="form-control" placeholder="Nama Obat" value="{{$obat->nama_obat}}" >
                        </div>
                        <div class="form-group">
                            <label @error('jenis_obat')
                            class="text-danger"
                            @enderror>Jenis Obat @error('jenis_obat')
                            | {{$message}}
                            @enderror</label>
                            <input name="jenis_obat" type="text" class="form-control" placeholder="Jenis Obat" value="{{$obat->jenis_obat}}" >
                        </div>

                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/obat" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
            </div>
            </div>
@stop
