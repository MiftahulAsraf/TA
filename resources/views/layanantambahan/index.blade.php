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
          <h1 class="m-0 text-dark">Kelola Layanan Tambahan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/layanantambahan">Data Layanan Tambahan</a></li>
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
                  <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">Tambah Layanan Tambahan</button>

              </nav>
      <div class="row mb-2">
          <div class="col-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Layanan Tambahan</h3>
</div>
<div class="card-body">
                <table class="display" id="tblayanantambahan">
  <thead>           
                        <tr>
                            <th scope="col">ID Layanan Tambahan</th>
                            <th scope="col">Nama Layanan Tambahan</th>
                            <th scope="col">Aksi</th>
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_layanantambahan as $layanantambahan)
                        <tr>
                            <td>{{$layanantambahan->id_layanan_tambahan}}</td>
                            <td>{{$layanantambahan->nama_layanan_tambahan}}</td>
                            <td>
                                <a href="/layanantambahan/{{$layanantambahan->id_layanan_tambahan}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/layanantambahan/{{$layanantambahan->id_layanan_tambahan}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
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
                    <form action="/layanantambahan/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label @error('id_layanan_tambahan')
                            class="text-danger"
                            @enderror> ID Layanan Tambahan @error('id_layanan_tambahan')
                            | {{$message}}
                            @enderror</label>
                            <input name="id_layanan_tambahan" type="text" class="form-control" placeholder="ID Layanan Tambahan" value="<?php echo "LYT".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('nama_layanan_tambahan')
                            class="text-danger"
                            @enderror> Nama Layanan Tambahan @error('nama_layanan_tambahan')
                            | {{$message}}
                            @enderror</label>
                            <input name="nama_layanan_tambahan" type="text" class="form-control" placeholder="Nama Layanan Tambahan">
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
    $('#tblayanantambahan').DataTable();
} );
</script>

@endsection