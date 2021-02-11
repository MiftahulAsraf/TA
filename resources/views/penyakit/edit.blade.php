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
          <h1 class="m-0 text-dark">Edit Data Penyakit</h1>
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
             <form action="/penyakit/{{$penyakit->id_penyakit}}/update" method="POST">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleInputNamaDepan1">ID Penyakit</label>
                            <input name="id_penyakit" type="text" class="form-control" placeholder="ID Penyakit" value="{{$penyakit->id_penyakit}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_penyakit')
                            class="text-danger"
                            @enderror>Nama Penyakit @error('nama_penyakit')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_penyakit" type="text" class="form-control" placeholder="Nama Penyakit" value="{{$penyakit->nama_penyakit}}" >
                        </div>


                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/penyakit" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
                </div>
                </div>
               
@stop
