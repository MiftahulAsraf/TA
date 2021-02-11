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
          <h1 class="m-0 text-dark">Kelola User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/user">Data User</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<!-- /.content-header -->

  <!-- Main content -->
  <section class="content-header">
    <div class="container-fluid">    
    <div class="row">
          <div class="col-md-12">
                    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">

                         
                      </nav>
            <div class="card">
            <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Data Akun</h3>
</div>
<div class="card-body">
                <table class="display" id="tbuser">
                <thead>
                        <tr>
                            <th scope="col">ID User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($data_user as $user)
                        <tr>
                            <td>{{$user->id_users}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->nama_user}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>
                                <a href="/user/{{$user->id_users}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/user/{{$user->id_users}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
</table>    
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-footer">
                <div class="row mb-2">
                   <div class="col-12">
                    </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>        
  </div><!-- /.container-fluid -->
</section><!-- Main content -->
      
      
    

@stop           
      
@section('mscript')
<script>

$(document).ready(function() {
    $('#tbuser').DataTable();
} );

</script>

@endsection