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
          <h1 class="m-0 text-dark">Edit Data Layanan Tambahan</h1>
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
             <form action="/layanantambahan/{{$layanantambahan->id_layanan_tambahan}}/update" method="POST">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label @error('id_layanan_tambahan')
                            class="text-danger"
                            @enderror> ID Layanan Tambahan @error('id_layanan_tambahan')
                            | {{$message}}
                            @enderror</label>
                            <input name="id_layanan_tambahan" type="text" class="form-control" placeholder="ID Layanan Tambahan" value="{{$layanantambahan->id_layanan_tambahan}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_layanan_tambahan')
                            class="text-danger"
                            @enderror> Nama Layanan Tambahan @error('nama_layanan_tambahan')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_layanan_tambahan" type="text" class="form-control" placeholder="Nama Layanan Tambahan" value="{{$layanantambahan->nama_layanan_tambahan}}" >
                        </div>

                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/layanantambahan" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
            </div>
            </div>
@stop
