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
          <h1 class="m-0 text-dark">Edit Data Layanan</h1>
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
             <form action="/layanan/{{$layanan->id_layanan}}/update" method="POST">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label @error('id_layanan')
                            class="text-danger"
                            @enderror>ID layanan @error('id_layanan')
                            | {{$message}}
                            @enderror</label>
                            <input name="id_layanan" type="text" class="form-control" placeholder="ID layanan" value="{{$layanan->id_layanan}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_layanan')
                            class="text-danger"
                            @enderror>Nama layanan @error('nama_layanan')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_layanan" type="text" class="form-control" placeholder="Nama layanan" value="{{$layanan->nama_layanan}}" >
                        </div>


                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/waktu" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
                </div>
                </div>
               
@stop
