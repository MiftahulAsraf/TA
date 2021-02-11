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
          <h1 class="m-0 text-dark">Edit Data Waktu</h1>
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
             <form action="/waktu/{{$waktu->id_waktu}}/update" method="POST">
                    {{csrf_field()}}

                        <div class="form-group">
                            <label  @error('id_waktu')
                            class="text-danger"
                            @enderror>ID Waktu @error('id_waktu')
                            | {{$message}}
                            @enderror</label>
                            <input name="id_waktu" type="text" class="form-control" placeholder="ID Waktu" value="{{$waktu->id_waktu}}" readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUmur1">Waktu Mulai</label>
                            <input name="waktu_mulai" type="time" class="form-control" placeholder="Waktu Mulai" value="{{$waktu->waktu_mulai}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUmur1">Waktu Selesai</label>
                            <input name="waktu_selesai" type="time" class="form-control" placeholder="Waktu Selesai" value="{{$waktu->waktu_selesai}}" >
                        </div>
                       <div class="form-group">
                            <label  @error('id_layanan')
                            class="text-danger"
                            @enderror>ID Layanan @error('id_layanan')
                            | {{$message}}
                            @enderror</label>
                            <select name="id_layanan" class="form-control" placeholder="ID Layanan">
                                @foreach($layanan as $data) 
                            <option value="{{$data->id_layanan}}">{{$data->nama_layanan}}</option>                       
                                @endforeach
                            </select>
                        </div>
                        
                            <h1></h1>
                              <button type="submit" class="btn btn-warning">Update</button>
                              <a class="btn btn-secondary" href="/waktu" role="button">Batal</a>
            
                    </form>
                    </div>
                </div>
               
                </div>
                </div>
               
@stop
