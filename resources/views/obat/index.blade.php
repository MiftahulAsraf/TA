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
          <h1 class="m-0 text-dark">Kelola Obat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/obat">Data Obat</a></li>
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
                  <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">Tambah Data Obat</button>

              </nav>

<div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Obat</h3>
</div>        
                <div class="card-body">
                <table class="display" id="tbobat">
  <thead>
                        <tr>
                            <th scope="col">ID Obat</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jenis Obat</th>
                            <th scope="col">Aksi</th>
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_obat as $obat)
                        <tr>
                            <td>{{$obat->id_obat}}</td>
                            <td>{{$obat->nama_obat}}</td>
                            <td>{{$obat->jenis_obat}}</td>
                            <td>
                                <a href="/obat/{{$obat->id_obat}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/obat/{{$obat->id_obat}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
</table>               
                </div>
    </div>        
                <div class="card-footer">
                <div class="row mb-2">
                   <div class="col-12">
                    </div>
                </div>
                <!-- /.row -->
              </div>
            
                              <!-- /.card-body -->

                              <!-- /.        
                              
                              <div class="card-footer">
                                
                              </div>
                              
                              card-footer-->

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
                    <form action="/obat/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label for="exampleInputNamaBelakang1">ID Obat</label>
                            <input name="id_obat" type="text" class="form-control" placeholder="ID Obat" value="<?php echo "OBT".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_obat')
                            class="text-danger"
                            @enderror>Nama Obat @error('nama_obat')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_obat" type="text" class="form-control" placeholder="Nama Obat">
                        </div>
                        <div class="form-group">
                            <label @error('jenis_obat')
                            class="text-danger"
                            @enderror>Jenis Obat @error('jenis_obat')
                            | {{$message}}
                            @enderror</label>
                            <input name="jenis_obat" type="text" class="form-control" placeholder="Jenis Obat">
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
    $('#tbobat').DataTable();
} );
</script>

@endsection