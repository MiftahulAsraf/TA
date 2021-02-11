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
          <h1 class="m-0 text-dark">Kelola Penyakit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/penyakit">Data Penyakit</a></li>
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
                  <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">Tambah Penyakit</button>

              </nav>
              <div class="row">
          <div class="col-md-12">
          <div class="card">          
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Penyakit</h3>
</div>       
<div class="card-body">
                <table class="display" id="tbpenyakit">
  <thead>                       
  <tr>
                            <th scope="col">ID Penyakit</th>
                            <th scope="col">Nama Penyakit</th>
                            <th scope="col">Aksi</th>
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_penyakit as $penyakit)
                        <tr>
                            <td>{{$penyakit->id_penyakit}}</td>
                            <td>{{$penyakit->nama_penyakit}}</td>
                            <td>
                                <a href="/penyakit/{{$penyakit->id_penyakit}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/penyakit/{{$penyakit->id_penyakit}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data Penyakit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                    <form action="/penyakit/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label for="exampleInputNamaBelakang1">ID Penyakit</label>
                            <input name="id_penyakit" type="text" class="form-control" placeholder="ID Penyakit" value="<?php echo "PYKT".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_penyakit')
                            class="text-danger"
                            @enderror>Nama Penyakit @error('nama_penyakit')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_penyakit" type="text" class="form-control" placeholder="Nama Penyakit">
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
    $('#tbpenyakit').DataTable();
} );
</script>

@endsection