@extends('layouts.master')
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/akun">Home</a></li>
              <li class="breadcrumb-item active">Contacts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-12 ">
            <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">My Account</h3>
</div>
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <table class='table table-hover'>
                    <tr>
                          <th>Nama</th>
                          <th>Umur</th>
                                  <th>Nomor Telepon</th>
                                  <th>Alamat</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Note</th>
                                  <th>ID Pasien</th>
                                  <th>Username</th>
                                  <th>Role</th>  
                                  <th>Aksi</th>
                              </tr>
                              
                              <tr>
                                  <td>{{Auth::User()->nama_user}}</td>
                                  <td>{{Auth::user()->pasien->umur}}</td>
                                  <td>{{Auth::user()->pasien->nomor_telp}}</td>
                                  <td>{{Auth::user()->pasien->alamat}}</td>
                                  <td>{{Auth::user()->pasien->jenis_kelamin}}</td>
                                  <td>{{Auth::user()->pasien->note}}</td>
                                  <td>{{Auth::User()->id_users}}</td>

                            <td>{{Auth::user()->username}}</td>
                            <td>{{Auth::user()->role->name}}</td>
                                  <td>
                                 
                                <a href="/akun/{{Auth::User()->id_users}}/edit" class="btn btn-warning btn-sm">Edit</a>
                           
                                  </td>
                              </tr>
                          </table>              
    </div>
    </div>
    </div>

          </div>
        </div>
        <!-- /.card-body -->


        <div class="card-footer">
          
          </div>
          <!-- /.card-footer -->
    
        
      </section>
      @stop  