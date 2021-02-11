@extends('layouts.master')
@section('content')

  

@if(session('sukses'))
<div class="alert alert-success" role="alert">
      {{session('sukses')}}
</div>
@endif

<!-- Content Header (Page header) -->  
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Pasien</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/pasien">Data Pasien</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
              <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">Tambah Akun Pasien</button>

              </nav>
              <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Pasien</h3>
</div>  
<div class="card-body">
                <table class="display" id="tbpas">
  <thead>
                        <tr>
                            <th scope="col">No Rekam Medis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Note</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_pasien as $pasien)
                        <tr>
                            <td>{{$pasien->no_rekammedis}}</td>
                            <td>{{$pasien->user->nama_user}}</td>
                            <td>{{$pasien->umur}}</td>
                            <td>{{$pasien->jenis_kelamin}}</td>
                            <td>{{$pasien->nomor_telp}}</td>
                            <td>{{$pasien->alamat}}</td>
                            <td>{{$pasien->note}}</td>
                            <td>
                                <a href="/pasien/{{$pasien->id_pasien}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
</table>          
                </div>              
                
            
                              <!-- /.card-body -->

                              <!-- /.        
                              
                              <div class="card-footer">
                                
                              </div>
                              
                              card-footer-->

    </div>        
                <div class="card-footer">
                <div class="row mb-2">
                   <div class="col-12">
                    </div>
                </div>
                <!-- /.row -->
              </div>
  </div><!-- /.container-fluid -->
</section><!-- Main content -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                    <form action="/pasien/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label >ID User</label>
                            <input name="id_users" type="text" class="form-control" placeholder="ID User" value="<?php echo "SEIRA".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label >No Rekam Medis</label>
                            <input name="no_rekammedis" type="text" class="form-control" placeholder="No Rekam Medis" value="<?php echo "RKM".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_user')
                            class="text-danger"
                            @enderror>Nama @error('nama_user')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_user" type="text" class="form-control" placeholder="Nama" value="{{old('nama_user')}}">
                        </div>
                        <div class="form-group">
                            <label @error('umur')
                            class="text-danger"
                            @enderror>Umur @error('umur')
                            | {{$message}}
                            @enderror</label>
                            <input name="umur" type="text" class="form-control" placeholder="Umur" value="{{old('umur')}}">
                        </div>
                        <div class="form-group">
                            <label @error('nomor_telp')
                            class="text-danger"
                            @enderror>Nomor Telepon @error('nomor_telp')
                            | {{$message}}
                            @enderror</label>
                            <input name="nomor_telp" type="numbtexter" class="form-control" placeholder="nomor Handphone" value="{{old('nomor_telp')}}">
                        </div>
                        <div class="form-group">
                            <label @error('jenis_kelamin')
                            class="text-danger"
                            @enderror>Jenis Kelamin @error('jenis_kelamin')
                            | {{$message}}
                            @enderror</label>
                            <select name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="{{old('jenis_kelamin')}}">
                                <option selected disabled readonly>-Jenis Kelamin-</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label @error('alamat')
                            class="text-danger"
                            @enderror>Alamat @error('alamat')
                            | {{$message}}
                            @enderror</label>
                            <textarea name=alamat class="form-control" placeholder="Alamat" rows="2" value="{{old('alamat')}}"></textarea>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputUmur1">note</label>
                            <input name="note" type="text" class="form-control" placeholder="ex: Alergi" >
                        </div>
                        <div class="form-group">
                            <label @error('username')
                            class="text-danger"
                            @enderror>username @error('username')
                            | {{$message}}
                            @enderror</label>
                            <input name="username" type="text" class="form-control" placeholder="Username" >
                        </div>
                        <div class="form-group">
                            <label @error('password')
                            class="text-danger"
                            @enderror>password @error('password')
                            | {{$message}}
                            @enderror</label>
                            <input name="password" type="password" class="form-control" placeholder="password" >
                        </div>
                                                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return confirm('anda yakin?')">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </div>
            </div>
            </div>

@stop           


@section('mscript')
<script>

$(document).ready(function() {
    $('#tbpas').DataTable();
} );

</script>

@endsection