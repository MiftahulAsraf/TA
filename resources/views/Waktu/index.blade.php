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
          <h1 class="m-0 text-dark">Kelola Waktu Layanan Klinik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/waktu">Data Waktu</a></li>
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
                  <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">Tambah Data Waktu Layanan Klinik</button>

              </nav>

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Waktu Reservasi</h3>
</div>     
                <div class="card-body">
                <table class="display" id="tbwaktu">
  <thead>   
                        <tr>
                            <th scope="col">ID Waktu</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu selesai</th>
                            <th scope="col">Nama Layanan</th>
                            <th scope="col">Aksi</th>
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_waktu as $waktu)
                        <tr>
                            <td>{{$waktu->id_waktu}}</td>
                            <td>{{$waktu->waktu_mulai}}</td>
                            <td>{{$waktu->waktu_selesai}}</td>
                            <td>{{$waktu->layanan->nama_layanan}}</td>
                            <td>
                                <a href="/waktu/{{$waktu->id_waktu}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/waktu/{{$waktu->id_waktu}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah data Waktu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
                    <div class="modal-body">
                    <!-- FORM -->
                    <form action="/waktu/create" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label @error('id_waktu')
                            class="text-danger"
                            @enderror>ID Waktu @error('id_waktu')
                            | {{$message}}
                            @enderror</label>
                            <input name="id_waktu" type="text" class="form-control" placeholder="ID Waktu" value="<?php echo "WKT".Rand(10,10000) ?>" readonly >
                        </div>
                        <div class="form-group">
                            <label @error('waktu_mulai')
                            class="text-danger"
                            @enderror>Waktu Mulai @error('waktu_mulai')
                            | {{$message}}
                            @enderror</label>
                            <input name="waktu_mulai" type="time" class="form-control" placeholder="Waktu mulai">
                        </div>
                        <div class="form-group">
                            <label @error('waktu_selesai')
                            class="text-danger"
                            @enderror>Waktu Selesai @error('waktu_selesai')
                            | {{$message}}
                            @enderror</label>
                            <input name="waktu_selesai" type="time" class="form-control" placeholder="Waktu selesai">
                            </div>
                        <div class="form-group">
                            <label @error('id_layanan')
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
    $('#tbwaktu').DataTable();
} );
</script>

@endsection     