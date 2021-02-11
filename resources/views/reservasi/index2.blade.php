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
          <h1 class="m-0 text-dark">Konfirmasi Layanan Klinik</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/konfirmasi">Konfirmasi</a></li>
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

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Belum Disetujui</h3>
</div>   
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>
                        <th>ID Reservasi</th>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Nama Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            
                        </tr>
                        @foreach($belumdisetujui as $reservasi)
                        <tr>
                        
                        <td>{{$reservasi->id_reservasi}}</td>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->pasien->alamat}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            <td>
                            <button type="submit" class="btn btn-warning btn-sm btn_no_telp" onclick="showModal('{{$reservasi->id_reservasi}}')" data-no_telp="{{ $reservasi->pasien->nomor_telp }}">Ubah Status</button>
                            <a href="/konfirmasi/{{$reservasi->id_reservasi}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
                            </td>
                            </tr>
                        @endforeach
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


<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Disetujui</h3>
</div>        
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>
                        <th>ID Reservasi</th>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Nama Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            
                        </tr>
                        @foreach($disetujui as $reservasi)
                        <tr>
                        <td>{{$reservasi->id_reservasi}}</td>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->pasien->alamat}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            <td>
                            <button type="submit" class="btn btn-warning btn-sm " onclick="showModal('{{$reservasi->id_reservasi}}')">Ubah Status</button>
                            <a href="/konfirmasi/{{$reservasi->id_reservasi}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
                            </td>
                            </tr>
                        @endforeach
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

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Selesai</h3>
</div>        
<div class="card-body">
                <table class="display" id="tbselesai">
  <thead>
                        <tr>
                        <th>ID Reservasi</th>
                            <th scope="col">Waktu Reservasi</th>
                            <th scope="col">Tanggal Reservasi</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nama Layanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            
                        </tr>
                        </thead>
  <tbody>
                        @foreach($selesai as $reservasi)
                        <tr>
                        <td>{{$reservasi->id_reservasi}}</td>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->pasien->alamat}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            <td>
                            <a href="/konfirmasi/{{$reservasi->id_reservasi}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
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

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">

        <div class="row">
          <div class="col-md-12">
          <div class="card">
          <div class="card card-primary">
              <div class="card-header">
              <h3 class="card-title">Ditolak / Dibatalkan</h3>
</div>               
                <div class="card-body">
                    <table class='table table-hover'>
                        <tr>
                        <th>ID Reservasi</th>
                            <th>Waktu Reservasi</th>
                            <th>Tanggal Reservasi</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Nama Layanan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            
                        </tr>
                        @foreach($ditolak as $reservasi)
                        <tr>
                        <td>{{$reservasi->id_reservasi}}</td>
                            <td>{{$reservasi->waktu_reservasi->waktu_mulai}}</td>
                            <td>{{$reservasi->tanggal_reservasi}}</td>
                            <td>{{$reservasi->pasien->user->nama_user}}</td>
                            <td>{{$reservasi->pasien->alamat}}</td>
                            <td>{{$reservasi->waktu_reservasi->layanan->nama_layanan}}</td>
                            <td>{{$reservasi->status}}</td>
                            <td>
                            <button type="submit" class="btn btn-warning btn-sm " onclick="showModal('{{$reservasi->id_reservasi}}')">Ubah Status</button>
                            <a href="/konfirmasi/{{$reservasi->id_reservasi}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin?')">Delete</a>
                            </td>
                            </tr>
                        @endforeach
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
              <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
                    <div class="modal-body">
                    <!-- FORM -->
                    <form action="#" id="actionModal" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label >ID Reservasi </label>
                            <input name="id_reservasi" type="text" class="form-control" id="id_reservasi" placeholder="ID Waktu" value="" readonly >
                            <input name="notelp" type="text" class="form-control no_telp" id="id_reservasi" placeholder="ID Waktu" value="" hidden >
                        </div>
                        <div class="form-group">
                            <label @error('status')
                            class="text-danger"
                            @enderror>Status @error('status')
                            | {{$message}}
                            @enderror</label>
                            <select name="status" class="form-control" placeholder="status" >
                                <option selected disabled readonly>-Status-</option>
                                <option value="1">Belum Disetujui</option>
                                <option value="2">Disetujui</option>
                                <option value="3">Selesai</option>
                                <option value="4">Dibatalkan/Ditolak</option>
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
  function showModal(idData){
    $('#actionModal').attr('action','/konfirmasi/'+idData+'/update');
    $('#id_reservasi').val(idData);
    $('#exampleModal').modal('show');

  };
    $(document).on("click",".btn_no_telp", function(){
      var no_telp = $(this).data("no_telp");
      $(".no_telp").val(no_telp);
    });

  $(document).ready(function() {
    $('#tbselesai').DataTable();
} );
</script>

@endsection
      
