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
          <h1 class="m-0 text-dark">Edit Data User</h1>
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
             <form action="/user/{{$user->id_users}}/update" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label @error('nama_user')
                            class="text-danger"
                            @enderror>Nama @error('nama_user')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_user" type="text" class="form-control" placeholder="Nama" value="{{$user->nama_user}}" >
                        </div>
                        <div class="form-group">
                            <label >Foto </label>
                            <input name="foto" type="file" class="form-control" placeholder="Foto" value="" >
                        </div>
                        <div class="form-group">
                            <label @error('username')
                            class="text-danger"
                            @enderror>Username @error('username')
                            | {{$message}}
                            @enderror</label>
                            <input name="username" type="text" class="form-control" placeholder="username" value="{{$user->username}}" >
                        </div>
                        <div class="form-group">
                            <label @error('password')
                            class="text-danger"
                            @enderror>Password @error('password')
                            | {{$message}}
                            @enderror</label>
                            <input name="password" type="password" class="form-control" placeholder="password" value="" >
                        </div>
                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/user" role="button" onclick="return confirm('anda yakin?')">Batal</a>
            
                    </form>
                    </div>
                </div>
               
            </div>
            </div>
@stop
